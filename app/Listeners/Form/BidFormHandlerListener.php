<?php

namespace App\Listeners\Form;

use App\Events\Form\BidFormEvent;
use App\Mail\Form\BidMail;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class BidFormHandlerListener
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
     * сообщение user, о том, нужно поззвонить (заказ звонка)
     */
    public function handle(BidFormEvent $event): void
    {
        /** по старому "сделаем" все переменные тут */

        $data['phone'] = $event->request->phone;
        $data['name'] = $event->request->name;
        $data['email'] = $event->request->email;
        $data['type'] = $event->request->type;
        $data['service'] = (is_null($event->request->service))?' - ' : $event->request->service;
        $data['training'] = (is_null($event->request->training))? ' - ': $event->request->training;
        $data['url'] = $event->request->url;


        Mail::to($this->emails())->send(new BidMail($data));


    }
}
