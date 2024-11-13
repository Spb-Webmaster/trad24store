<?php
namespace Domain\Training\ViewModels;


use App\Models\Training;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class TrainingViewModel
{
    use Makeable;


    public function training($slug) :Model | null
    {

        return Training::query()
            ->where('slug', $slug)
            ->where('published', true)
            ->first();
    }


    public function trainings() :Collection | null
    {

        return Training::query()
            ->where('published', true)
            ->orderBy('sorting')
            ->get();
    }
    public function trainings5() :Collection | null
    {

        return Training::query()
            ->where('published', true)
            ->orderBy('sorting')
            ->take(5)
            ->get();
    }



}
