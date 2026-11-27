<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TradeMemberPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $password
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your FreightConnect Trade Member Password',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.trade-member-password',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
