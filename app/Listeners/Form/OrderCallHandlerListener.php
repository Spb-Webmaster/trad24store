<?php

namespace App\Listeners\Form;

use App\Events\Form\OrderCallEvent;
use App\Mail\Form\OrderCallMail;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class OrderCallHandlerListener
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
    public function handle(OrderCallEvent $event): void
    {
        $data['phone'] = $event->request->phone;
        $data['name'] = $event->request->name;
        $data['url'] = $event->request->url;

        Mail::to($this->emails())->send(new OrderCallMail($data));


    }
}
