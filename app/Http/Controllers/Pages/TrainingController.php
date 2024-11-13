<?php
namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Domain\Training\ViewModels\TrainingViewModel;

class TrainingController extends Controller
{

    public function training($slug) {

        $item = TrainingViewModel::make()->training($slug);
        $items = TrainingViewModel::make()->trainings();

        if(!$item) {
            abort(404);
        }

        return view('pages.training.training', [
            'item'=> $item,
            'items'=> $items
        ]);
    }

    public function trainings() {

        $items = TrainingViewModel::make()->trainings();


        if(!$items) {
            abort(404);
        }

        return view('pages.training.trainings', [
            'items'=> $items
        ]);
    }




}
