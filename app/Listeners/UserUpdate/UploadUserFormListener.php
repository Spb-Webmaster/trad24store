<?php

namespace App\Listeners\UserUpdate;

use App\Events\UserUpdate\UpdateUserFormEvent;
use App\Jobs\UserUpdate\UpdateUserJob;
use App\Mail\Dashboard\UpdateUserMail;
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


        $item = $event->request->toArray();


        $data['id'] = $item['id']; /** создади новый массив $data (id ) */

        $hash = $this->save_token($item['id']); /** подключили trait, записали токен */


        if(!$hash) {
            Log::info('$hash не создался или не сохранился. См. trait src/Support/Traits/CreatorToken.php'); // в логи

        }

        if (is_array($data)) {
            $data = array_merge($data, ['hash' => $hash]); /** добаваим hash */
        }

        UpdateUserJob::dispatch($data);  /** отправим Job  массив $data (id, hash ) */


         //Mail::to($this->emails())->send(new UpdateUserMail($item));


    }
}
