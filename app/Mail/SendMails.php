<?php

namespace App\Mail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendMails
{



    public function sendOrderCall($data):void
    {
        $view = 'html.email.order_call';
        $subject = 'Заказ обратного звонка ' . $data['phone'];

        Mail::send($view, ['data' => $data],  function ($message) use ($subject){
            $message->to(config('app.mail_username'), 'Admin')->subject($subject);
        });
    }

    public function sendOrderBlueFormCall($data):void
    {
        $view = 'html.email.order_call_blue';
        $subject = 'Заказ обратного звонка с синий формы  ' . $data['phone'];

        Mail::send($view, ['data' => $data],  function ($message) use ($subject){
            $message->to(config('app.mail_username'), 'Admin')->subject($subject);
        });
    }


    public function sendBidForm($data):void
    {
        $view = 'html.email.order_bid_form';
        $subject = 'Форма заявки на обучение или услугу  ' . $data['phone'];

        Mail::send($view, ['data' => $data],  function ($message) use ($subject){
            $message->to(config('app.mail_username'), 'Admin')->subject($subject);
        });
    }


    public function sendSingUpLessonForm($data):void
    {
        $view = 'html.email.order_sing_up_lesson_form';
        $subject = 'Форма заявки на обучение  - ' . $data['title'];

        Mail::send($view, ['data' => $data],  function ($message) use ($subject){
            $message->to(config('app.mail_username'), 'Admin')->subject($subject);
        });
    }




}
