<?php

namespace Domain\Diplom\ViewModels;


use App\Models\Diplom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class DiplomViewModel
{
    use Makeable;


    public function search($title = null, $name = null): Model|null
    {

        $result = null;

        if ($name) {
            $result = Diplom::query()
                ->where('published', true)
                ->where('name', $name)
                ->first();
        }
        if($result) {
            return $result;
        }

        if ($title) {
            $result = Diplom::query()
                ->where('published', true)
                ->where('title', $title)
                ->first();
        }

        return $result;

    }

    public function render($data): String|null
    {

        if(!$data) return '';

        $str ='<div class="wi600"><div class="wrap_th"><div class="flex_th"><div class="th__ th1">Дата выдачи</div><div class="th__ th2">Номер диплома</div><div class="th__ th3">ФИО</div><div class="th__ th4">Дисциплина</div></div></div>';
        $str .='<div class="wrap_tr"><div class="flex_tr">';
        $str .='<div class="td__ td1">'. (($data->date)??' - ') .'</div>';
        $str .='<div class="td__ td2">'. (($data->title)??' - ') .'</div>';
        $str .='<div class="td__ td3">'. (($data->name)??' - ') .'</div>';
        $str .='<div class="td__ td4">'. (($data->training)??' - ') .'</div>';
        $str .='</div><!--.flex_tr--></div><!--.wrap_tr--></div><!--.wi600-->';

        return $str;

    }


}
