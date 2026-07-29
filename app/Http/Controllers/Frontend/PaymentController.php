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
            abort(404);
        }

        $contact = Contact::query()->where('khalti_pidx', $pidx)->firstOrFail();

        $result = $khalti->lookup($pidx);
        $status = $result['status'] ?? 'Pending';

        $contact->khalti_transaction_id = $result['transaction_id'] ?? null;
        $contact->payment_status = match ($status) {
            'Completed' => 'completed',
            'Pending', 'Refunded', 'Partially Refunded' => 'pending',
            default => 'failed', 
        };
        $contact->save();

        if ($contact->payment_status === 'completed') {
            SudamSweetAlert::toast('success', 'भुक्तानी सफल भयो! धन्यवाद।');
        } elseif ($contact->payment_status === 'failed') {
            SudamSweetAlert::toast('warning', 'भुक्तानी असफल भयो। कृपया पुनः प्रयास गर्नुहोस्।');
        } else {
            SudamSweetAlert::toast('info', 'भुक्तानी प्रक्रियामा छ।');
        }

        return redirect()->route('contact');
    }
}
