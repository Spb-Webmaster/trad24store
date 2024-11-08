<?php
namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class TrainingController extends Controller
{

    public function training($slug) {

        $item = '';

        if(!$item) {
            abort(404);
        }
        return view('pages.training.training', [
            'item'=> $item
        ]);
    }

}
