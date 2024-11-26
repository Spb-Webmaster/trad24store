<?php

namespace Domain\Timetable\ViewModels;


use App\Models\TimetableCity;
use App\Models\TimetableLesson;
use App\Models\TimetableMonth;
use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class TimetableViewModel
{
    use Makeable;


    public function timetable_cities(): Collection|null
    {

        $timetablecity = Cache::rememberForever('timetablecity', function () {

            return TimetableCity::query()
            ->where('published', true)
            ->orderBy('sorting', 'desc')
            ->get();
        });
        return $timetablecity;
    }


    public function timetable_months(): Collection|null
    {
        $timetablemonth = Cache::rememberForever('timetablemonth', function () {
        return TimetableMonth::query()->get();
        });
        return $timetablemonth;
    }


    public function timetable_city($slug): Model|null
    {

        return TimetableCity::query()
            ->where('published', true)
            ->where('slug', $slug)
            ->first();
    }

    public function timetable_lesson($slug): Model|null
    {

        return TimetableLesson::query()
            ->where('published', true)
            ->where('slug', $slug)
            ->first();
    }

    /**
     * @param $timetable_city
     * @param $mount
     * @return String
     * Получение всех предметов определенного месяца и определенного города
     */
    public function timetable_city_lessons_month($timetable_city = null, $mount = null, $lesson = null): string
    {
        $today = Carbon::now();

        if (is_null($mount)) {
            $today_month = strtolower($today->format('F'));
        } else {
            $today_month = $mount;
        }
        $query = TimetableLesson::whereHas('timetable_month', function ($q) use ($today_month) {
            $q->where('slug', $today_month);
        });
        $query->where('published', true);

        if ($timetable_city->slug) {
            $query->whereHas('timetable_city', function ($q) use ($timetable_city) {
                $q->where('slug', $timetable_city->slug);

            });
        }

        if ($lesson) {
            $query->where('id', $lesson->id);
            $no_link = false; // если предмет один ссылку не ставим
        } else {
            $no_link = true;
        }

        $lessons = $query->get();


        return $this->render($lessons, $timetable_city, $today_month, $no_link);

    }

    /**
     * @param $data
     * @param $city
     * @param $month
     * Рендер HTML  всех предметов определенного месяца и определенного города
     * @return String|null
     */
    public function render($data, $city = null, $month = null, $link = null): string|null
    {

        if (!$data) return '';

        $str = '<div class="wi600"><div class="wrap_th"><div class="flex_th"><div class="th__ th1">Дата</div><div class="th__ th2">Курс</div><div class="th__ th3">Примечание</div><div class="th__ th4">Время проведения</div><div class="th__ th5">Стоимость</div><div class="th__ th6">Академ.ч.</div></div></div>';

        foreach ($data as $item) {

            // dd($item->timetable_city);


            $fancy = '<a href="#sign_up" data-options=\'{"slug" : "' . $item->slug . '","city" : "' . $city->title . '","title" : "' . $item->title . '", "date" : "' . (($item->date) ?: ' - ') . '", "price" : "' . (($item->price) ? (($item->price_prefix) ? 'от ' : '') . price($item->price) . ' ' . config('currency.currency.KZT') : ' - ') . '"}\' data-fancybox>' . $item->title . '</a>';
            if ($link) {


                $link_lesson = '<a class="modal__link" target="_blank" href="' . route('timetable_city_lesson', ['slug' => $city->slug, 'lesson' => $item->slug]) . '"></a>';
            } else {
                $link_lesson = '';
            }


            $str .= '<div class="wrap_tr"><div class="flex_tr">';
            $str .= '<div class="td__ td1">' . (($item->date) ?: ' - ') . '</div>';
            $str .= '<div class="td__ td2">' . (($item->title) ? $fancy : ' - ') . ' <span class="link">' . $link_lesson . '</span></div>';
            $str .= '<div class="td__ td3">' . (($item->message) ?: ' - ') . '</div>';
            $str .= '<div class="td__ td4">' . (($item->time) ?: ' - ') . '</div>';
            $str .= '<div class="td__ td5">' . (($item->price) ? (($item->price_prefix) ? 'от ' : '') . price($item->price) . ' ' . config('currency.currency.KZT') : ' - ') . '</div>';
            $str .= '<div class="td__ td6">' . (($item->a_hour) ?: ' - ') . '</div>';
            $str .= '</div><!--.flex_tr--></div><!--.wrap_tr-->';
        }
        $str .= '</div>';
        return $str;

    }


}
