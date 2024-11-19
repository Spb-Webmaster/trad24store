<?php
namespace Domain\Timetable\ViewModels;


use App\Models\TimetableCity;
use App\Models\TimetableLesson;
use App\Models\Training;
use Carbon\Carbon;
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
            ->orderBy('sorting', 'desc')
            ->get();
    }


    public function timetable_city($slug) :Model | null
    {

        return TimetableCity::query()
            ->where('published', true)
            ->where('slug', $slug)
            ->first();
    }

    public function timetable_lesson($slug) :Model | null
    {

        return TimetableLesson::query()
            ->where('published', true)
            ->where('slug', $slug)
            ->first();
    }


    public function timetable_city_lessons_month($city_id = null, $mount = null, ):String
    {
        $today = Carbon::now();

        if(is_null($mount)) {
            $today_month = strtolower($today->format('F'));
        } else {
            $today_month = $mount;
        }

      //  $query = TimetableLesson::whereJSONContains('month', [$today_month]);

        $query = TimetableLesson::where(function ($q) use ($today_month){
            $q->whereJSONContains('month', [$today_month])
                ->orWhere('allmonths', 1);
        });

        $query->where('published', true);

        if($city_id)
        {
            $query->where(function ($q) use ($city_id) {
                $q->where('timetable_city_id', $city_id)
                    ->orWhere('allcities', 1);
            });

        }


        $lessons = $query->get();

       return $this->render($lessons);

    }


    public function render($data): String|null
    {

        if(!$data) return '';

        $str ='<div class="wi600"><div class="wrap_th"><div class="flex_th"><div class="th__ th1">Дата</div><div class="th__ th2">Курс</div><div class="th__ th3">Примечание</div><div class="th__ th4">Время проведения</div><div class="th__ th5">Стоимость</div><div class="th__ th6">Академ.ч.</div></div></div>';

        foreach ($data as $item) {
            $fancy = '<a href="#sign_up" data-options=\'{"slug" : "'. $item->slug .'","city" : "'. $item->timetable_city->title .'","title" : "'. $item->title .'", "date" : "'.(($item->date)?:' - ').'", "price" : "'.(($item->price)? (($item->price_prefix)?'от ': '') . price($item->price) . ' ' . config('currency.currency.KZT'):' - ').'"}\' data-fancybox>'.$item->title.'</a>';
            $link = '<a class="modal__link" href="'.route('timetable_city_lesson', ['slug' => $item->timetable_city->slug, 'lesson' => $item->slug]).'"></a>';

            $str .= '<div class="wrap_tr"><div class="flex_tr">';
            $str .= '<div class="td__ td1">'.(($item->date)?:' - ').'</div>';
            $str .= '<div class="td__ td2">'.(($item->title)?$fancy:' - ').' <span class="link">'. $link .'</span></div>';
            $str .= '<div class="td__ td3">'.(($item->message)?:' - ').'</div>';
            $str .= '<div class="td__ td4">'.(($item->time)?:' - ').'</div>';
            $str .= '<div class="td__ td5">'.(($item->price)?(($item->price_prefix)?'от ': '') . price($item->price) . ' ' . config('currency.currency.KZT'):' - ').'</div>';
            $str .= '<div class="td__ td6">'.(($item->a_hour)?:' - ').'</div>';
            $str .= '</div><!--.flex_tr--></div><!--.wrap_tr-->';
        }
        $str .='</div>';
        return $str;

    }




}
