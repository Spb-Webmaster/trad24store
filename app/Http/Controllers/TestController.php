<?php

namespace App\Http\Controllers;


use App\Models\Diplom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{

public function test() {

    foreach(config2('moonshine.data.diplom') as $diplom) {



  /*          $article = Diplom::create([
                'title' => $diplom['number'],
                'name' => $diplom['fio'],
                'date' => $diplom['date'],
                'training' => $diplom['training'],
            ]);*/


   }



    return view('pages.test');
}



}
