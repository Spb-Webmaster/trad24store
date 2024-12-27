<?php

namespace App\Listeners\UserUpdate;

use App\Events\UserUpdate\UpdateUserFormEvent;
use App\Mail\SendMails;
use App\Mail\UpdateUser;
use App\Mail\UpdateUserSelf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class UploadUserFormListener
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
     * сообщение admin
     */
    public function handle(UpdateUserFormEvent $event): void
    {


        $item = $event->request;


        $hash = $this->save_token($item->id); /** подключили trait, записали токен */


        if(!$hash) {
            Log::info('$hash не создался или не сохранился. См. trait src/Support/Traits/CreatorToken.php'); // в логи

        }

        $item->hash = $hash; /** добаваим hash */

        Mail::to($this->emails())->send(new UpdateUser($item));


    }
}
