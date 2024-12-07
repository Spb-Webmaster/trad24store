<?php
namespace App\Http\Controllers\Users\Search;


use App\Http\Controllers\Controller;
use App\Http\Requests\MediatorSearchRequest;
use Domain\User\ViewModels\SearchViewModel;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\Request;

class MediatorSearchController extends Controller
{

    public function prof_mediators_search(Request $request){

        //dd($request->all());
        if($request->mediator_search == '' and $request->mediator_city == 0) {
            return redirect(route('prof_mediators'));
        }
        $items = SearchViewModel::make()->prof_mediators_search($request);
        $cities = UserViewModel::make()->cities_mediators();


        return view('pages.users.prof_mediators', [
            'items'=> $items,
            'mediator_search' => $request->mediator_search,
            'mediator_city' => $request->mediator_city,
            'cities'=> $cities

        ]);

    }


    public function company_mediators_search(Request $request){

        //dd($request->all());

        if($request->mediator_search == '' and $request->mediator_city == 0) {
            return redirect(route('company_mediators'));
        }
        $items = SearchViewModel::make()->company_mediators_search($request);
        $cities = UserViewModel::make()->cities_mediators();

        return view('pages.users.company_mediators', [
            'items'=> $items,
            'mediator_search' => $request->mediator_search,
            'mediator_city' => $request->mediator_city,
            'cities'=> $cities

        ]);

    }


    public function notprof_mediators_search(Request $request){

        //dd($request->all());

        if($request->mediator_search == '' and $request->mediator_city == 0) {
            return redirect(route('notprof_mediators'));
        }
        $items = SearchViewModel::make()->notprof_mediators_search($request);
        $cities = UserViewModel::make()->cities_mediators();

        return view('pages.users.notprof_mediators', [
            'items'=> $items,
            'mediator_search' => $request->mediator_search,
            'mediator_city' => $request->mediator_city,
            'cities'=> $cities

        ]);

    }

}
