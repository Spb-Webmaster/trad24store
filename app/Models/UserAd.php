<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAd extends Model
{
    protected $table = 'user_ads';

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'image',
        'desc',
        'gallery',
        'file',
        'published',
        'params',
        'sorting',
    ];

    protected $casts = [
        'params' => 'collection',
        'file' => 'collection'
    ];

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
