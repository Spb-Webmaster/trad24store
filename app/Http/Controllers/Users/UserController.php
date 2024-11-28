<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Domain\Training\ViewModels\TrainingViewModel;
use Domain\User\ViewModels\UserViewModel;

class UserController extends Controller
{

    public function reestr() {

        return redirect(route('prof_mediators'));
    }

    public function prof_mediators() {

        $items = UserViewModel::make()->prof_mediators();

        if(!$items) {
            abort(404);
        }

        return view('pages.users.prof_mediators', [
            'items'=> $items
        ]);
    }

    public function company_mediators() {

        $items = UserViewModel::make()->company_mediators();

        if(!$items) {
            abort(404);
        }

        return view('pages.users.company_mediators', [
            'items'=> $items
        ]);
    }

    public function notprof_mediators() {

        $items = UserViewModel::make()->notprof_mediators();

        if(!$items) {
            abort(404);
        }

        return view('pages.users.notprof_mediators', [
            'items'=> $items
        ]);
    }


    public function mediators() {


        $items = UserViewModel::make()->mediators();

        if(!$items) {
            abort(404);
        }

        return view('pages.users.mediators', [
            'items'=> $items
        ]);
    }






}
