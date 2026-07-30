<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Services\KhaltiService;
use Illuminate\Http\Request;
use Sudam\SudamSweetAlert\Facades\SudamSweetAlert;

class PaymentController extends Controller
{
    public function callback(Request $request, KhaltiService $khalti)
    {
        $pidx = $request->query('pidx');

        if (! $pidx) {
            SudamSweetAlert::toast('warning', 'भुक्तानी जानकारी फेला परेन।');
            return redirect()->route('contact');
        }

        $contact = Contact::query()->where('khalti_pidx', $pidx)->first();

        if (! $contact) {
            SudamSweetAlert::toast('warning', 'भुक्तानी जानकारी फेला परेन।');
            return redirect()->route('contact');
        }

        // Khalti appends status directly to the return_url on cancel,
        // so we can short-circuit without even calling lookup().
        if ($request->query('status') === 'User canceled') {
            $contact->payment_status = 'failed';
            $contact->save();

            SudamSweetAlert::toast('warning', 'तपाईंले भुक्तानी रद्द गर्नुभयो।');
            return redirect()->route('contact');
        }

        try {
            $result = $khalti->lookup($pidx);
        } catch (\Throwable $e) {
            report($e);

            $contact->payment_status = 'failed';
            $contact->save();

            SudamSweetAlert::toast('warning', 'भुक्तानी पुष्टि गर्न सकिएन। कृपया पुनः प्रयास गर्नुहोस्।');
            return redirect()->route('contact');
        }

        $status = $result['status'] ?? 'Pending';

        $contact->khalti_transaction_id = $result['transaction_id'] ?? null;
        $contact->payment_status = match ($status) {
            'Completed' => 'completed',
            'Pending', 'Refunded', 'Partially Refunded' => 'pending',
            'User canceled' => 'failed',
            default => 'failed',
        };
        $contact->save();

        match ($contact->payment_status) {
            'completed' => SudamSweetAlert::toast('success', 'भुक्तानी सफल भयो! धन्यवाद।'),
            'failed'    => SudamSweetAlert::toast('warning', 'भुक्तानी असफल वा रद्द भयो। कृपया पुनः प्रयास गर्नुहोस्।'),
            default     => SudamSweetAlert::toast('info', 'भुक्तानी प्रक्रियामा छ।'),
        };

        return redirect()->route('contact');
    }
}
