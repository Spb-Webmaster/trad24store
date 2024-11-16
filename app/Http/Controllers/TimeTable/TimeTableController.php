<?php

namespace App\Http\Controllers\TimeTable;

use App\Http\Controllers\Controller;
use App\Models\Page;

class TimeTableController extends Controller
{
    /**
     * Вывод страницы
     */
    public function index()
    {

        $timetable = '';

        return view('pages.timetable.timetable',
            [
                'timetable' => $timetable,
            ]);
    }

    public function city()
    {

        $timetable = '';

        return view('pages.timetable.timetable_city',
            [
                'timetable' => $timetable,
            ]);
    }



}
