<?php

namespace App\Mail;

use App\Models\Admins\Invite;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Admins\InviteSeller;

class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(InviteSeller $inviteSeller)
    {


        $this->inviteSeller = $inviteSeller;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invite')->from('you@example.com')
            ->with([
                'inviteSeller'   => $this->inviteSeller
            ]);
    }
}
