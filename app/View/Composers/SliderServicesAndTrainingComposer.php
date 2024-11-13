<?php

namespace App\View\Composers;




use Domain\Service\ViewModels\ServiceViewModel;
use Domain\Training\ViewModels\TrainingViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SliderServicesAndTrainingComposer
{
    public function compose(View $view): void
    {
        $services = ServiceViewModel::make()->services();
        $trainings = TrainingViewModel::make()->trainings();




        $collection = $services->concat($trainings)->shuffle(); // Contains foo and bar.
        if(!count($collection)) {
            $collection = false;
        }



        $view->with([
            'collection' => $collection,
        ]);

    }

}
