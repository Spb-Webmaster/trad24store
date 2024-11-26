<?php

namespace Domain\Product\ViewModels;


use App\Models\MediatorProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use MoonShine\Tests\Fixtures\Models\Category;
use Support\Traits\Makeable;

class ProductViewModel
{
    use Makeable;

    public function product($slug):Model|null
    {

            return MediatorProduct::query()
                ->where('published', true)
                ->where('slug', $slug)
                ->first();


    }



}
