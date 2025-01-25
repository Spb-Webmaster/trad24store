<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimetableCity extends Model
{

    protected $table = 'timetable_cities';

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'title_teaser',
        'img_teaser',
        'text_teaser',
        'text',
        'sorting',
        'timetable_id',
        'metatitle',
        'description',
        'keywords',
        'published',
        'params',
        'module',
    ];

    protected $casts = [
        'module' => 'collection',
        'params' => 'collection',
    ];

    public function timetable():BelongsTo
    {
        return $this->belongsTo(Timetable::class);
    }

    public function timetable_lesson():BelongsToMany
    {
        return $this->belongsToMany(TimetableLesson::class);
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
