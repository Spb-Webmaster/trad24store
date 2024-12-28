<?php

namespace App\Listeners\Auth;

use App\Events\Auth\ResetPasswordEvent;
use App\Mail\Auth\ResetPasswordMail;
use App\Mail\Auth\SignUnAdminMail;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class ResetPasswordHandlerListener
{

    use EmailAddressCollector;
    use CreatorToken;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * сообщение user-у о сбросе пароля
     */
    public function handle(ResetPasswordEvent $event): void
    {

        $data['token'] = $event->token;
        $data['email'] = $event->email;

        Mail::to($event->email)->send(new ResetPasswordMail($data));

    }
}
