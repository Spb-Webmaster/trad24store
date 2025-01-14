<?php

namespace App\Listeners\Auth;

use App\Events\Auth\DeleteUserEvent;
use App\Mail\Auth\DeleteUserMail;
use App\Mail\Auth\SignUnUserMail;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class DeleteUserHandlerListener
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
    public function handle(DeleteUserEvent $event): void
    {

                $user = $event->user;


                Mail::to($this->emails())->send(new DeleteUserMail($user));



    }
}
