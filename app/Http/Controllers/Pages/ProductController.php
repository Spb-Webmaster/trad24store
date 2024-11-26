<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Domain\Category\ViewModels\CategoryViewModel;
use Domain\Product\ViewModels\ProductViewModel;

class ProductController  extends Controller
{
    /**
     * @param $slug
     * @return void
     * вывод продукта
     */
    public function product($category, $slug) {



        $product = ProductViewModel::make()->product($slug);
        $categories = CategoryViewModel::make()->categories();
        $category = CategoryViewModel::make()->category($category);


        return view('pages.product.product', [
            'product' => $product,
            'items' => $categories,
            'category' => $category,
        ]);
    }



}
