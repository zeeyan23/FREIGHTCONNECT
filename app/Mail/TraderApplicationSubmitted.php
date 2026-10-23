<?php

namespace App\Mail;

use App\Models\TraderMemberAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TraderApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public TraderMemberAccount $trader
    ) {}

    public function build()
    {
        return $this->subject(
            'Your FreightConnect Application Has Been Submitted'
        )->view('emails.trader-application-submitted');
    }
}
