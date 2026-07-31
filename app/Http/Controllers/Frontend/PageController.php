<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AdvertiseRequestMail;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use App\Services\KhaltiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Sudam\SudamSweetAlert\Facades\SudamSweetAlert;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::query()->where("status", true)->get();
        View::share([
            "categories" => $categories
        ]);
    }

    public function home()
    {
        $latest_articles = Article::query()->where("status", true)->latest()->take(5)->get();
        $advertises = Advertise::query()->where("expiry_date", ">=", time())->get();

        return view('Frontend.home', compact('latest_articles','advertises'));
    }
    public function category($slug)
    {
        $category = Category::query()->where("slug", $slug)->first();
        $advertises = Advertise::query()->where("expiry_date", ">=", time())->where("status",true)->get();
        return view('Frontend.category', compact('category', 'advertises'));
    }
    public function search(Request $request)
    {
        $q = $request->q;
        $articles = Article::query()->where("title", "like", "%$q%")->get();
        $advertises = Advertise::query()->where("expiry_date", ">=", time())->get();
        return view('Frontend.search', compact('articles', 'advertises', 'q'));
    }
    public function article($slug)
    {
        $article = Article::query()->where("slug", $slug)->first();
        $advertises = Advertise::query()->where("expiry_date", ">=", time())->get();
        return view('Frontend.article', compact('article', 'advertises'));
    }
    public function contact()
    {
        return view('Frontend.contact');
    }
    public function contact_store(Request $request, KhaltiService $khalti)
    {
        $validated = $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', 'max:255'],
            'phone'        => ['required', 'string', 'max:20'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'service_type' => ['required', 'in:one_week,one_month,one_year'],
            'message'      => ['required', 'string', 'max:2000'],
            'banner'       => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'], // 5MB
        ], [
            'name.required'         => 'कृपया आफ्नो नाम लेख्नुहोस्।',
            'email.required'        => 'कृपया आफ्नो इमेल लेख्नुहोस्।',
            'email.email'           => 'कृपया मान्य इमेल ठेगाना लेख्नुहोस्।',
            'phone.required'        => 'कृपया आफ्नो फोन नम्बर लेख्नुहोस्।',
            'service_type.required' => 'कृपया सेवा प्रकार छान्नुहोस्।',
            'service_type.in'       => 'अमान्य सेवा प्रकार।',
            'message.required'      => 'कृपया सन्देश लेख्नुहोस्।',
            'banner.image'          => 'ब्यानर फाइल तस्बिर हुनुपर्छ।',
            'banner.mimes'          => 'ब्यानर jpg, jpeg, png वा webp फर्म्याटमा हुनुपर्छ।',
            'banner.max'            => 'ब्यानर फाइलको आकार 5MB भन्दा बढी हुनु हुँदैन।',
        ]);

        $contact = new Contact();
        $contact->name          = $validated['name'];
        $contact->email         = $validated['email'];
        $contact->phone         = $validated['phone'];
        $contact->company_name  = $validated['company_name'] ?? null;
        $contact->service_type  = $validated['service_type'];
        $contact->message       = $validated['message'];
        $contact->payment_status = 'pending';
        $contact->payment_amount = Contact::PRICES[$validated['service_type']];

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage', $file_name);
            $contact->banner = $file_name;
        }

        $contact->save();

        Mail::to(User::query()->first())->send(new AdvertiseRequestMail($contact));

     
        try {
            $response = $khalti->initiate([
                'return_url'          => route('khalti.callback'),
                'website_url'         => config('app.url'),
                'amount'              => $contact->payment_amount * 100, // paisa
                'purchase_order_id'   => 'CONTACT-' . $contact->id . '-' . Str::random(6),
                'purchase_order_name' => 'Advertisement - ' . (Contact::SERVICE_LABELS[$contact->service_type] ?? $contact->service_type),
                'customer_info'       => [
                    'name'  => $contact->name,
                    'email' => $contact->email,
                    'phone' => $contact->phone,
                ],
            ]);
            // dd($response);

            $contact->khalti_pidx = $response['pidx'];
            $contact->save();

            return redirect()->away($response['payment_url']);
        } catch (\Throwable $e) {
            report($e);
            $contact->payment_status = 'failed';
            $contact->save();

            SudamSweetAlert::toast('warning', 'फारम बुझियो, तर भुक्तानी सुरु गर्न सकिएन। हामी चाँडै सम्पर्क गर्नेछौं।');
            return redirect('contact');
        }
    }
}
