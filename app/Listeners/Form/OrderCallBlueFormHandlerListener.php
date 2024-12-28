<?php

namespace App\Listeners\Form;

use App\Events\Form\OrderCallBlueFormEvent;
use App\Mail\Form\BidMail;
use App\Mail\Form\OrderCallBlueMail;
use App\Mail\SendMails;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class OrderCallBlueFormHandlerListener
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
    public function handle(OrderCallBlueFormEvent $event): void
    {
        /** по старому "сделаем" все переменные тут */

        $data['phone'] = $event->request->phone;
        $data['name'] = $event->request->name;
        $data['email'] = $event->request->email;
        $data['url'] = $event->request->url;


        Mail::to($this->emails())->send(new OrderCallBlueMail($data));

    }
}
