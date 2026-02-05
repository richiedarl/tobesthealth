<?php

namespace App\Mail;

use App\Models\ContactEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public ContactEnquiry $contact;

    public function __construct(ContactEnquiry $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this
            ->subject('New Contact Enquiry Received')
            ->from('no-reply@tobesthealth.co.uk', 'TobestHealth')
            ->replyTo($this->contact->email, $this->contact->name)
            ->view('emails.admin.contact-enquiry')
            ->text('emails.admin.contact-enquiry-text')
            ->with([
                'contact' => $this->contact,
            ]);
    }
}
