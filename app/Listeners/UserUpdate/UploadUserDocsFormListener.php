<?php

namespace App\Listeners\UserUpdate;


use App\Events\UserUpdate\UploadUserDocsFormEvent;
use App\Mail\SendMails;

class UploadUserDocsFormListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * сообщение admin
     */
    public function handle(UploadUserDocsFormEvent $event): void
    {


    }
}
