<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TimetableMonth extends Model
{
  protected $table = 'timetable_months';
  protected $fillable = [
      'title',
      'slug'
  ];
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
