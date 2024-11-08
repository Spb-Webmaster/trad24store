<?php
namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    public function service($slug) {

        $item = '';

        if(!$item) {
            abort(404);
        }

        return view('pages.service.service', [
            'item'=> $item
        ]);
    }

}
