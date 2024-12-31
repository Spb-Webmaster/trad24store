<?php

namespace App\Listeners\UserUpdate;


use App\Events\UserUpdate\UploadUserDocsFormEvent;
use App\Jobs\UserUpdate\UpdateUserDocsJob;
use App\Mail\Dashboard\UpdateUserDocsMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Support\Traits\CreatorToken;
use Support\Traits\EmailAddressCollector;

class UploadUserDocsFormListener
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
    public function handle(UploadUserDocsFormEvent $event): void
    {

        $data = $event->request;
        $hash = $this->save_token($data['id']); /** подключили trait, записали токен */


        if(!$hash) {
            Log::info('$hash не создался или не сохранился. См. trait src/Support/Traits/CreatorToken.php'); // в логи
            exit;
        }
        if (is_array($data)) {
            $data = array_merge($data, ['hash' => $hash]);

        }



        UpdateUserDocsJob::dispatch($data); // Job

      //  Mail::to($this->emails())->send(new UpdateUserDocsMail($data));

    }
}
