<?php

namespace Domain\User\ViewModels;
use App\Models\User;
use Support\Traits\Makeable;

class SearchViewModel
{
    use Makeable;

    public function prof_mediators_search($request)
    {

        $city = $request->mediator_city;
        $search = $request->mediator_search;
        $result = User::query()
            ->get_search_data($search, 1, $city)
            ->paginate(20);
        return $result;


    }
    public function company_mediators_search($request)
    {
        $city = $request->mediator_city;
        $search = $request->mediator_search;
        $result = User::query()
            ->get_search_data($search, 2, $city)
            ->paginate(20);
        return $result;


    }

    public function notprof_mediators_search($request)
    {
        $city = $request->mediator_city;
        $search = $request->mediator_search;
        $result = User::query()
            ->get_search_data($search, 3, $city)
            ->paginate(20);
        return $result;


    }

}
