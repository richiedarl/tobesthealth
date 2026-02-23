<?php
// app/Mail/AdminStaffNotification.php

namespace App\Mail;

use App\Models\Staff;
use App\Models\HcaDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class AdminStaffNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $staff;
    public $data;
    public $applicationType;
    public $hcaDetails;

    /**
     * Create a new message instance.
     */
    public function __construct(Staff $staff, array $data, string $applicationType, $hcaDetails = null)
    {
        $this->staff = $staff;
        $this->data = $data;
        $this->applicationType = $applicationType;
        $this->hcaDetails = $hcaDetails;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->applicationType === 'nurse' 
            ? 'New Nurse Application Submitted' 
            : 'New Healthcare Assistant Application Submitted';
            
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-staff-notification',
            with: [
                'staff' => $this->staff,
                'data' => $this->data,
                'applicationType' => $this->applicationType,
                'hcaDetails' => $this->hcaDetails,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        // Return empty array - attachments disabled temporarily
        // Will add PDF/image generation later when packages are installed
        return [];
    }
}