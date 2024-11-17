<?php

namespace App\View\Composers;



use App\Models\ChangeLoadContact;

use App\Models\City;
use Domain\Service\ViewModels\ServiceViewModel;
use Domain\Timetable\ViewModels\TimetableViewModel;
use Domain\Training\ViewModels\TrainingViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuTopComposer
{
    public function compose(View $view): void
    {

        $services = ServiceViewModel::make()->services();
        $trainings = TrainingViewModel::make()->trainings();
        $timetable_cities = TimetableViewModel::make()->timetable_cities();

        $view->with([
            'services' => $services,
            'trainings' => $trainings,
            'timetable_cities' => $timetable_cities,


        ]);

    }

}
