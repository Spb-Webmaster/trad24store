<?php

namespace App\Listeners\UserUpdate;


use App\Events\UserUpdate\UploadUserDocsFormEvent;
use App\Mail\SendMails;

class UploadUserDocsFormEventListener
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
     * сообщение user, о том, нужно поззвонить (отзыв)
     */
    public function handle(UploadUserDocsFormEvent $event): void
    {
        $data['name'] = $event->request->name;
        $data['phone'] = $event->request->phone;
        $data['email'] = $event->request->email;
        $data['feedback'] = textarea($event->request->feedback);
        $data['url'] = $event->request->url;
        $data['mediator_name'] = ($event->request->user_name)?:' - ';
        $data['mediator_phone'] = ($event->request->user_phone)?:' - ';
        $data['mediator_email'] = ($event->request->user_email)?:' - ';
        $data['stars'] = $event->request->feedback_star;


        $sendMail =  new SendMails();
        $sendMail->feedback($data);

    }
}
