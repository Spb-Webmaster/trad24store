<?php
namespace Domain\Timetable\ViewModels;


use App\Models\TimetableCity;
use App\Models\Training;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class TimetableViewModel
{
    use Makeable;




    public function timetable_cities() :Collection | null
    {

        return TimetableCity::query()
            ->where('published', true)
            ->orderBy('sorting')
            ->get();
    }




}
