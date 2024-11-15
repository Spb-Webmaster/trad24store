<?php

namespace App\Listeners;

use App\Events\BidFormEvent;
use App\Events\OrderCallEvent;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BidFormHandlerListener
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
    public function handle(BidFormEvent $event): void
    {
        $data['phone'] = $event->request->phone;
        $data['name'] = $event->request->name;
        $data['email'] = $event->request->email;
        $data['type'] = $event->request->type;
        $data['service'] = (is_null($event->request->service))?' - ' : $event->request->service;
        $data['training'] = (is_null($event->request->training))? ' - ': $event->request->training;
        $data['url'] = $event->request->url;

        $sendMail =  new SendMails();
        $sendMail->sendBidForm($data);

    }
}
