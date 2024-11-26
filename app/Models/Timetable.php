<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Timetable extends Model
{
    protected $table = 'timetables';

    protected $fillable = [
        'title',
        'text',
    ];

        public function timetable_city():HasMany
        {
            return $this->hasMany(TimetableCity::class);
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
