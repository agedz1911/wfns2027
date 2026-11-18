<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class CVFacultySubmitted extends Mailable
{
    public function __construct(public string $fullName) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for submitting your faculty CV - WFNS 2027',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.cv-faculty-submitted',
        );
    }
}
