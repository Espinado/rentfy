<?php

namespace App\Helpers;

use App\Models\Admins\InviteSeller;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;

class Invite
{


    public static function generateToken()
    {
        $token = bin2hex(openssl_random_pseudo_bytes(32));
        return $token;
    }
}

