<?php

namespace App\Listeners\Pay;

use App\Events\Form\OrderCallEvent;
use App\Events\Pay\OrderPayEvent;
use App\Mail\Form\OrderCallMail;
use App\Mail\Pay\OrderPayMail;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class OrderPayHandlerListener
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
     * сообщение user, о том, что хотят подписку
     */
    public function handle(OrderPayEvent $event): void
    {
        $user = auth()->user();
        $data['user'] = $user->user;
        $data['phone'] = format_phone($user->phone);
        $data['email'] = $user->email;
        $data['price'] = '1000 ' . config('currency.currency.KZT');
        $data['url'] = $event->request->url;

        Mail::to($this->emails())->send(new OrderPayMail($data));


    }
}
