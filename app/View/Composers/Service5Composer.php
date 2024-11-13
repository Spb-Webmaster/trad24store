<?php

namespace App\View\Composers;




use Domain\Service\ViewModels\ServiceViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class Service5Composer
{
    public function compose(View $view): void
    {
        $services5 = ServiceViewModel::make()->services5();

        if(!count($services5)) {
            $services5 = false;
        };

        $view->with([
            'services5' => $services5,
        ]);

    }

}
