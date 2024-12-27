<?php

namespace App\Listeners\UserUpdate;

use App\Events\UserUpdate\UpdateUserSelfFormEvent;
use App\Mail\UpdateUserSelf;
use App\Models\UserToken;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class UploadUserSelfFormListener
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
    public function handle(UpdateUserSelfFormEvent $event): void
    {
        $data = $event->request->toArray();

        $hash = $this->save_token($data['id']); /** подключили trait, записали токен */

        if(!$hash) {
            Log::info('$hash не создался или не сохранился. См. trait src/Support/Traits/CreatorToken.php'); // в логи
            exit;
        }

        $data = array_merge($data, ['hash' => $hash]);
        Mail::to($this->emails())->send(new UpdateUserSelf($data));


    }



}
