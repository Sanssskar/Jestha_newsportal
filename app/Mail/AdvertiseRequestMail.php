<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdvertiseRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public Contact $contact;

    /**
     * Human-readable labels for the service_type values used in the contact form.
     */
    public static array $serviceTypeLabels = [
        'one_week'  => '१ हप्ता / रु १,५००',
        'one_month' => '१ महिना / रु ५,०००',
        'one_year'  => '१ वर्ष / रु ५०,०००',
    ];

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'नयाँ विज्ञापन अनुरोध - ' . ($this->contact->company_name ?: $this->contact->name),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.advertise-request',
            with: [
                'contact' => $this->contact,
                'serviceTypeLabel' => self::$serviceTypeLabels[$this->contact->service_type] ?? $this->contact->service_type,
            ],
        );
    }
}
