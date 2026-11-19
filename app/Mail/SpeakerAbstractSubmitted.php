<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class SpeakerAbstractSubmitted extends Mailable
{
    public function __construct(public string $fullName) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for submitting your speaker abstract - WFNS 2027',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.speaker-abstract-submitted',
        );
    }
}
