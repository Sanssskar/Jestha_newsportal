<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        $latest_articles = Article::query()->where("status", true)->latest()->take(3)->get();
        return view('Frontend.home', compact('latest_articles'));
    }
    public function category($slug)
    {
        $category = Category::query()->where("slug", $slug)->first();
        $advertises = Advertise::query()->where("expiry_date", ">=", time())->get();
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
    public function contact(){
        return view('Frontend.contact');
    }
    public function contact_store(Request $request){
    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->company_name = $request->company_name;
    $contact->service_type = $request->service_type;
    $contact->message = $request->message;
    $file = $request->banner;
    if($file){
        $file_name = time().".".$file->getClientOriginalExtension();   //hero.jpg
        $file->move('/storage',$file_name);
        $contact->banner = $file_name;
    }
    $contact->save();
    return redirect('contact');

    }
}
