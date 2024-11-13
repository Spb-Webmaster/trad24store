<?php

namespace App\Listeners;

use App\Events\OrderCallBlueFormEvent;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCallBlueFormHandlerListener
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
    public function handle(OrderCallBlueFormEvent $event): void
    {
        $data['phone'] = $event->request->phone;
        $data['name'] = $event->request->name;
        $data['email'] = $event->request->email;
        $data['url'] = $event->request->url;

        $sendMail =  new SendMails();
        $sendMail->sendOrderBlueFormCall($data);

    }
}
