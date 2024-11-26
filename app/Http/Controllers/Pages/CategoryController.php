<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Domain\Category\ViewModels\CategoryViewModel;

class CategoryController  extends Controller
{
    /**
     * @param $slug
     * @return void
     * вывод категории
     */
    public function category($slug) {

        $category = CategoryViewModel::make()->category($slug);
        $categories = CategoryViewModel::make()->categories();


       return view('pages.catogory.category', [
            'category' => $category,
            'items' => $categories,
        ]);
    }



    public function categories() {

        dd('categories  - app/Http/Controllers/Pages/CategoryController.php');
    }
}
