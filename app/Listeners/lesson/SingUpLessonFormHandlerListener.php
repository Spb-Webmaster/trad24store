<?php

namespace App\Listeners\lesson;

use App\Events\Lesson\SingUpLessonFormEvent;
use App\Mail\Lesson\LessonBidMail;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class SingUpLessonFormHandlerListener
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
     * сообщение user, о том, регистрация на урок
     */
    public function handle(SingUpLessonFormEvent $event): void
    {

        /** по старому "сделаем" все переменные тут */

        $data['name'] = $event->request->name;
        $data['phone'] = $event->request->phone;
        $data['email'] = $event->request->email;

        $data['title'] = $event->request->title;
        $data['date'] = (is_null($event->request->date))?' - ' : $event->request->date;
        $data['price'] = (is_null($event->request->price))? ' - ': $event->request->price;
        $data['city'] = (is_null($event->request->city))? ' - ': $event->request->city;
        $data['url'] = $event->request->url;

        Mail::to($this->emails())->send(new LessonBidMail($data));




    }
}
