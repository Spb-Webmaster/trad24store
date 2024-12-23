<?php

namespace App\Listeners\UserUpdate;

use App\Events\UserUpdate\UploadUserSelfFormEvent;
use App\Mail\UpdateUserSelf;
use App\Models\UserToken;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UploadUserSelfFormEventListener
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
     * сообщение user, о том, нужно поззвонить (отзыв)
     */
    public function handle(UploadUserSelfFormEvent $event): void
    {
        $data = $event->request->all();
        $hash = $this->add_token($data['id']);

        if($hash) {
            $data = array_merge($data, ['hash' => $hash]);
        }

        //dd($this->emails());

        Mail::to($this->emails())->send(new UpdateUserSelf($data));


    }

    public function add_token($id) {

        $hash = md5(Str::random(5));

        $user_token = new UserToken;

        $user_token->token = $hash;
        $user_token->user_id = $id;

        $user_token->save();
        return $hash;

    }

    /** Метод создания массива для использования его в отправке ** */

    public function emails()
    {

        settype($emails, "array");
        if (config2('moonshine.setting.json_emails')) {
            $manager_emails = config2('moonshine.setting.json_emails');
            foreach ($manager_emails as $e) {
                $emails[] = $e['json_email'];
            }
        }
        array_push($emails, (config('app.mail_admin')) ?? []);

        if (count($emails)) {
            return $emails;
        }
        return [];
    }

}
