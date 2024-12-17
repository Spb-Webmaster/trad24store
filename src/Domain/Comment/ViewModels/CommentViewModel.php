<?php

namespace Domain\Comment\ViewModels;


use App\Models\User;
use App\Models\UserCity;
use App\Models\UserComment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Support\Traits\Makeable;

class CommentViewModel
{
    use Makeable;

    public function store($request): Model|null
    {

        return UserComment::create([
            'user_id' => $request->user_id,
            'stars' => $request->feedback_star,
            'title' => ($request->name) ?: '',
            'phone' => ($request->phone) ? phone($request->phone) : '',
            'email' => ($request->email) ?: '',
            'desc' => textarea($request->feedback)
        ]);


    }

    public function comments($id): LengthAwarePaginator
    {

        return UserComment::query()
            ->where('published', 1)
            ->where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    /**
     * @param $id
     * @param $stars
     * @return array
     * получаем кличество комментарием с оценками и выставляем среднее арифметическое
     */

    public function rating($id): float
    {
        $stars = UserComment::query()
          //  ->where('published', 1)
            ->select('stars')
            ->where('user_id', $id)
            ->get();


        if ($stars) {
            $count = count($stars); // количество отзывов
            foreach ($stars as $item) {
                $result[] = $item->stars;
            }

            $sum = array_sum($result); //сумма отзывов
            $arif = ceil($sum / $count);

        }


           return (isset($arif))?$arif:0;



    }


}
