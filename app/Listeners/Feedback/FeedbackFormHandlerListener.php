<?php

namespace App\Listeners\Feedback;

use App\Events\Feedback\FeedbackFormEvent;
use App\Mail\Feedback\FeedbackMail;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class FeedbackFormHandlerListener
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
     * сообщение user, о том, нужно поззвонить (отзыв)
     */
    public function handle(FeedbackFormEvent $event): void
    {
        /** по старому "сделаем" все переменные тут */

        $data['name'] = $event->request->name;
        $data['phone'] = $event->request->phone;
        $data['email'] = $event->request->email;
        $data['feedback'] = textarea($event->request->feedback);
        $data['url'] = $event->request->url;
        $data['mediator_name'] = ($event->request->user_name)?:' - ';
        $data['mediator_phone'] = ($event->request->user_phone)?:' - ';
        $data['mediator_email'] = ($event->request->user_email)?:' - ';
        $data['stars'] = $event->request->feedback_star;

         Mail::to($this->emails())->send(new FeedbackMail($data));

    }
}
