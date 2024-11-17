<?php

namespace App\Http\Controllers\TimeTable;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Domain\Timetable\ViewModels\TimetableViewModel;

class TimeTableController extends Controller
{
    /**
     * Вывод страницы
     */
    public function index()
    {

        $timetable = '';
        $items = TimetableViewModel::make()->timetable_cities();



        return view('pages.timetable.timetable',
            [
                'timetable' => $timetable,
                'items' => $items,
            ]);
    }

    public function timetable_city($slug)
    {

        $timetable = '';
        $items = TimetableViewModel::make()->timetable_cities();

        return view('pages.timetable.timetable_city',
            [
                'timetable' => $timetable,
                'items' => $items,
            ]);
    }

    public function timetable_diplom()
    {

        $timetable = '';
        $items = TimetableViewModel::make()->timetable_cities();

        return view('pages.timetable.timetable_diplom',
            [
                'timetable' => $timetable,
                'items' => $items,
            ]);
    }



}
