<?php
namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Domain\Service\ViewModels\ServiceViewModel;

class ServiceController extends Controller
{

    public function service($slug) {

        $item = ServiceViewModel::make()->service($slug);
        $items = ServiceViewModel::make()->services();



        if(!$item) {
            abort(404);
        }

        return view('pages.service.service', [
            'item'=> $item,
            'items'=> $items
        ]);
    }

    public function services() {

        $items = ServiceViewModel::make()->services();


        if(!$items) {
            abort(404);
        }

        return view('pages.service.services', [
            'items'=> $items
        ]);
    }

}
