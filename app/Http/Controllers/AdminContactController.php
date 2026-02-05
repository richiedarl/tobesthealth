<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactEnquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminContactNotification;

class AdminContactController extends Controller
{
    //

    public function index(){
    $contacts = ContactEnquiry::latest()->paginate(15);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(ContactEnquiry $contact)
    {
        if (is_null($contact->opened_at) || $contact->opened_at == 0) {
            $contact->update([
                'opened_at' => now(),
            ]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function store_contact(Request $request)
{
    $data = $request->validate([
        'name'    => ['required', 'string', 'max:255'],
        'email'   => ['required', 'email', 'max:255'],
        'subject' => ['required', 'string', 'max:255'],
        'message' => ['required', 'string'],
    ]);

    // Always save first
    $contact = ContactEnquiry::create([
        'name'      => $data['name'],
        'email'     => $data['email'],
        'subject'   => $data['subject'],
        'message'   => $data['message'],
        'opened_at' => null,
    ]);

    // Try sending email, never block saving
    try {
        Mail::to('admin@tobesthealth.co.uk')
            ->send(new AdminContactNotification($contact));
    } catch (\Throwable $e) {
        logger()->warning('Admin contact email failed', [
            'contact_id' => $contact->id,
            'error' => $e->getMessage(),
        ]);
    }

    return redirect()
        ->route('contact')
        ->with(
            'success',
            'Your message has been sent successfully. Our team will get back to you shortly.'
        );
}
}
