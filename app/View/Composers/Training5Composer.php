<?php

namespace App\View\Composers;




use Domain\Service\ViewModels\ServiceViewModel;
use Domain\Training\ViewModels\TrainingViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class Training5Composer
{
    public function compose(View $view): void
    {
        $trainings5 = TrainingViewModel::make()->trainings5();

        if(!count($trainings5)) {
            $trainings5 = false;
        };

        $view->with([
            'trainings5' => $trainings5,
        ]);

    }

}
