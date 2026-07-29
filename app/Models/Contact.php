<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'company_name', 'banner',
        'service_type', 'message', 'payment_status',
        'khalti_pidx', 'khalti_transaction_id', 'payment_amount',
    ];

    /** Price in NPR (whole rupees) per service type */
    public const PRICES = [
        'one_week'  => 1500,
        'one_month' => 5000,
        'one_year'  => 50000,
    ];

    public const SERVICE_LABELS = [
        'one_week'  => '१ हप्ता / रु १,५००',
        'one_month' => '१ महिना / रु ५,०००',
        'one_year'  => '१ वर्ष / रु ५०,०००',
    ];
}
