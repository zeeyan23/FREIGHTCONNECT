<?php

namespace App\Mail;

use App\Models\ForwardingMemberAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForwardingApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ForwardingMemberAccount $application
    ) {}

    public function build()
    {
        return $this->subject(
            ' FreightConnect | Membership Application Received'
        )->view('emails.forwarding-application-submitted');
    }
}
