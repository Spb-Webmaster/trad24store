<?php

namespace App\Listeners\Auth;

use App\Events\Auth\CreateUserEvent;
use App\Mail\Auth\SignUnUserMail;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class CreateUserHandlerListener
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
     * сообщение user о СВОЕЙ  регистрации
     */
    public function handle(CreateUserEvent $event): void
    {

                $user = $event->user;


                Mail::to($user->email)->send(new SignUnUserMail($user));



    }
}
