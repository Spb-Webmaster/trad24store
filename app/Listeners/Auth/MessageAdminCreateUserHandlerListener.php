<?php

namespace App\Listeners\Auth;

use App\Events\Auth\MessageAdminCreateUserEvent;
use App\Mail\Auth\SignUnAdminMail;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class MessageAdminCreateUserHandlerListener
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
     * сообщение админу о регистрации user-а
     */
    public function handle(MessageAdminCreateUserEvent $event): void
    {
        $user = $event->user;

        Mail::to($this->emails())->send(new SignUnAdminMail($user));

    }
}
