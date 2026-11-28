<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuestEmailOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $otp
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your FreightConnect Email Verification Code',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.trade-non-member-email-otp',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
