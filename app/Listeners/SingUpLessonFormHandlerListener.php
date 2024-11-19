<?php

namespace App\Listeners;

use App\Events\BidFormEvent;
use App\Events\OrderCallEvent;
use App\Events\SingUpLessonFormEvent;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SingUpLessonFormHandlerListener
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
     * сообщение user, о том, нужно поззвонить (заказ звонка)
     */
    public function handle(SingUpLessonFormEvent $event): void
    {
        $data['name'] = $event->request->name;
        $data['phone'] = $event->request->phone;
        $data['email'] = $event->request->email;

        $data['title'] = $event->request->title;
        $data['date'] = (is_null($event->request->date))?' - ' : $event->request->date;
        $data['price'] = (is_null($event->request->price))? ' - ': $event->request->price;
        $data['city'] = (is_null($event->request->city))? ' - ': $event->request->city;
        $data['url'] = $event->request->url;

        $sendMail =  new SendMails();
        $sendMail->sendSingUpLessonForm($data);

    }
}
