<?php

namespace App\View\Composers;




use Domain\Partner\ViewModels\PartnerViewModel;
use Domain\Service\ViewModels\ServiceViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PartnersComposer
{
    public function compose(View $view): void
    {
        $partners = PartnerViewModel::make()->partners();

        if(!count($partners)) {
            $partners = false;
        };

        $view->with([
            'partners' => $partners,
        ]);

    }

}
