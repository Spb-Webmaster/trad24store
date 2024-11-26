<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TimetableLesson extends Model
{

    protected $table = 'timetable_lessons';

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'title_teaser',
        'img_teaser',
        'text_teaser',
        'text',
        'sorting',
        'timetable_city_id',
        'timetable_month_id',
        'metatitle',
        'description',
        'keywords',
        'published',
        'params',
        'month',
        'module',
        'date',
        'message',
        'time',
        'price',
        'a_hour',

    ];
    protected $casts = [
        'module' => 'collection',
        'params' => 'collection',
        'month' => 'collection',
    ];


    public function timetable_city():BelongsToMany
    {
        return $this->belongsToMany(TimetableCity::class);
    }


    public function timetable_month():BelongsToMany
    {
        return $this->belongsToMany(TimetableMonth::class);
    }

    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
         static::saving(function ($Moonshine) {

         });


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
