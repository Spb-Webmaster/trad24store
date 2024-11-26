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
        $timetable_months = TimetableViewModel::make()->timetable_months();



        return view('pages.timetable.timetable',
            [
                'timetable_cities' => $timetable_cities,
                'timetable_months' => $timetable_months,
            ]);
    }

    public function timetable_city($slug)
    {

        $timetable_cities = TimetableViewModel::make()->timetable_cities();
        $timetable_months = TimetableViewModel::make()->timetable_months();

        $timetable_city = TimetableViewModel::make()->timetable_city($slug);


        if(!$timetable_city) {
            abort(404);
        }

        $mounth =  null;

        if(session('mounth')) {
            $mounth = session('mounth'); // если в сессии mounth, то получаем результаты вместе с mounth
            session()->forget('mounth'); // удалим
        }


        $lessons_month = TimetableViewModel::make()->timetable_city_lessons_month($timetable_city, $mounth);





        return view('pages.timetable.timetable_city',
            [
                'timetable_city' => $timetable_city,
                'timetable_cities' => $timetable_cities,
                'lessons_month' => $lessons_month,
                'timetable_months' => $timetable_months,
                'session_mounth' => $mounth
            ]);
    }



      public function timetable_city_lesson($slug, $lesson)
    {



        $timetable_cities = TimetableViewModel::make()->timetable_cities();
        $timetable_city = TimetableViewModel::make()->timetable_city($slug);
        $timetable_months = TimetableViewModel::make()->timetable_months();

        if(!$timetable_city) {
            abort(404);
        }

        $mounth =  null;

        if(session('mounth')) {
            $mounth = session('mounth'); // если в сессии mounth, то получаем результаты вместе с mounth
            session()->forget('mounth'); // удалим
        }

        $lesson_item        = TimetableViewModel::make()->timetable_lesson($lesson);
        $lessons_month = TimetableViewModel::make()->timetable_city_lessons_month($timetable_city, $mounth, $lesson_item);



        return view('pages.timetable.timetable_city_lesson',
            [
                'timetable_city' => $timetable_city,
                'timetable_cities' => $timetable_cities,
                'lessons_month' => $lessons_month,
                'timetable_months' => $timetable_months,
                'session_mounth' => $mounth,
                'lesson_item' => $lesson_item
            ]);
    }



    public function timetable_diplom()
    {


        return view('pages.timetable.timetable_diplom');
    }



}
