<?php

namespace App\View\Composers;



use App\Models\ChangeLoadContact;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ChangeContactComposer
{
    public function compose(View $view): void
    {
        $first = ChangeLoadContact::query()->first(); // основные


        $phone = (isset($first->phone))?$first->phone:config2('moonshine.setting.phone1');
        $whatsapp = (isset($first->whatsapp))?$first->whatsapp:config2('moonshine.setting.whatsapp');
        $telegram = (isset($first->telegram))?$first->telegram:config2('moonshine.setting.telegram');


        $view->with([
            'phone' => $phone,
            'whatsapp' => $whatsapp,
            'telegram' => $telegram,
        ]);

    }

}
