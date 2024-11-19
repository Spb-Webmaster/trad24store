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

        $timetable_cities = TimetableViewModel::make()->timetable_cities();



        return view('pages.timetable.timetable',
            [
                'timetable_cities' => $timetable_cities,
            ]);
    }

    public function timetable_city($slug)
    {

        $timetable_cities = TimetableViewModel::make()->timetable_cities();
        $timetable_city = TimetableViewModel::make()->timetable_city($slug);

        if(!$timetable_city) {
            abort(404);
        }

        $mounth =  null;

        if(session('mounth')) {
            $mounth = session('mounth'); // если в сессии mounth, то получаем результаты вместе с mounth
            session()->forget('mounth'); // удалим
        }

        $lessons_month = TimetableViewModel::make()->timetable_city_lessons_month($timetable_city->id, $mounth);

        return view('pages.timetable.timetable_city',
            [
                'timetable_city' => $timetable_city,
                'timetable_cities' => $timetable_cities,
                'lessons_month' => $lessons_month,
                'session_mounth' => $mounth
            ]);
    }



      public function timetable_city_lesson($slug, $lesson)
    {

        $timetable_cities = TimetableViewModel::make()->timetable_cities();
        $timetable_city = TimetableViewModel::make()->timetable_city($slug);

        if(!$timetable_city) {
            abort(404);
        }

        $mounth =  null;

        if(session('mounth')) {
            $mounth = session('mounth'); // если в сессии mounth, то получаем результаты вместе с mounth
            session()->forget('mounth'); // удалим
        }

        $lessons_month = TimetableViewModel::make()->timetable_city_lessons_month($timetable_city->id, $mounth);
        $lesson        = TimetableViewModel::make()->timetable_lesson($lesson);

        return view('pages.timetable.timetable_city_lesson',
            [
                'timetable_city' => $timetable_city,
                'timetable_cities' => $timetable_cities,
                'lessons_month' => $lessons_month,
                'session_mounth' => $mounth,
                'lesson' => $lesson
            ]);
    }



    public function timetable_diplom()
    {


        return view('pages.timetable.timetable_diplom');
    }



}
