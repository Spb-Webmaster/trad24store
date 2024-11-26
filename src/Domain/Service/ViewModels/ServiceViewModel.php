<?php
namespace Domain\Service\ViewModels;


use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class ServiceViewModel
{
    use Makeable;


    public function service($slug) :Model | null
    {

       return Service::query()
            ->where('slug', $slug)
            ->where('published', true)
            ->first();
    }


    public function services() :Collection | null
    {
        $service = Cache::rememberForever('service', function () {

            return Service::query()
                ->where('published', true)
                ->orderBy('sorting')
                ->get();
        });
        return $service;
    }

    public function services5() :Collection | null
    {
        $service5 = Cache::rememberForever('service5', function () {

       return Service::query()
            ->where('published', true)
            ->orderBy('sorting')
           ->take(5)
            ->get();
        });
        return $service5;
    }



}
