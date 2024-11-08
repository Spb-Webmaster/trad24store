<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'title',
        'slug',
        'subtitle',

        'title_teaser',
        'img_teaser',
        'text_teaser',
        'published_menu',
        'title_menu',

        'img',
        'img_top',
        'text',
        'img_bottom',
        'text2',

        'faq_title',
        'faq',

        'published',
        'params',

        'metatitle',
        'description',
        'keywords',
        'sorting'];


    protected $casts = [
        'params' => 'collection',
        'faq' => 'collection',
        'module' => 'collection',
    ];


    public function getArrayModulesAttribute()
    {
        /*      0  =>     '-',
                1  =>     'Услуги',
                2 =>      'Обучение',
                3 =>      'Преимущества медиации',
                4 =>      'Реестр медиаторов',
                5 =>      'Полезное (новости)',
                6 =>      'Партнеры',
                7 =>      'Форма',
        */

        if ($this->module) {


            $mod = [];
            foreach ($this->module as $m) {
                if ($m['mod_id'] != 0) {

                    $mod[$m['mod_id']] = 'modules.module_' . $m['mod_id'];
                }
            }

        }

        return $mod;
    }

    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
        #  static::saving(function ($Moonshine) {   });


        static::created(function () {
            cache_clear();
        });

        static::updated(function () {
            cache_clear();
        });

        static::deleted(function () {
            cache_clear();
        });


    }
}
