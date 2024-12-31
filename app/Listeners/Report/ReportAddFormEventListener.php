<?php

namespace App\Listeners\Report;

use App\Events\Lesson\SingUpLessonFormEvent;
use App\Events\Report\ReportAddFormEvent;
use App\Mail\Lesson\LessonBidMail;
use App\Mail\Report\ReportAddMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class ReportAddFormEventListener
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
    public function handle(ReportAddFormEvent $event): void
    {

        $data = $event->request;


        Mail::to($this->emails())->send(new ReportAddMail($data));




    }

}
