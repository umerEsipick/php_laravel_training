<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\User;
use App\Http\Requests;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function sendEmailReminder($id = null)
    {
        $user = User::findOrFail($id);

        FacadesMail::send('auth.send_mail', ['email' => base64_encode($user->email)], function($m) use ($user)
        {
            $m->from('hello@example.com', 'Example');
            $m->to($user->email, $user->name)->subject('Test mail');
        });
        // FacadesMail::to($user->user())->send(new OrderShipped);

    }
}
