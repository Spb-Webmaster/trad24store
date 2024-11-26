<?php

namespace Domain\Category\ViewModels;


use App\Models\Contact;
use App\Models\MediatorCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use MoonShine\Tests\Fixtures\Models\Category;
use Support\Traits\Makeable;

class CategoryViewModel
{
    use Makeable;

    public function category($slug):Model|null
    {


            return MediatorCategory::query()
                ->where('published', true)
                ->where('slug', $slug)
                ->with(['mediator_product' => fn ($query) => $query->orderBy('sorting', 'desc')])
                ->first();

    }

    public function categories():Collection|null
    {

                $categories =   Cache::rememberForever('categories', function() {
                    return MediatorCategory::query()
                        ->where('published', true)
                        ->get();
                });

            return $categories;


    }



}
