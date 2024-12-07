<?php

namespace App\Listeners;

use App\Events\FeedbackFormEvent;
use App\Events\OrderCallEvent;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FeedbackFormHandlerListener
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
    public function handle(FeedbackFormEvent $event): void
    {
        $data['name'] = $event->request->name;
        $data['phone'] = $event->request->phone;
        $data['email'] = $event->request->email;
        $data['feedback'] = strip_tags(nl2br($event->request->feedback),'<code><p><br><br /><br/><b><i><strong>');
        $data['url'] = $event->request->url;
        $data['mediator_name'] = ($event->request->user_name)?:' - ';
        $data['mediator_phone'] = ($event->request->user_phone)?:' - ';
        $data['mediator_email'] = ($event->request->user_email)?:' - ';
        $data['stars'] = $event->request->feedback_star;


        $sendMail =  new SendMails();
        $sendMail->feedback($data);

    }
}
