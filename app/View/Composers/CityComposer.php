<?php

namespace App\View\Composers;



use App\Models\ChangeLoadContact;

use App\Models\City;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CityComposer
{
    public function compose(View $view): void
    {

        // получить данные из сессии:
        $session_city_city = session('city_city');
        $session_city_phone = session('city_phone');
        $cities = City::query()->orderBy('sorting', 'asc')->get();
        $city_city = $cities->first()->city;
        $city_phone = $cities->first()->phone;

        $view->with([
            'cities' => $cities,
            'session_city_city' => $session_city_city,
            'session_city_phone' => $session_city_phone,
            'city_city' => $city_city,
            'city_phone' => $city_phone,

        ]);

    }

}
