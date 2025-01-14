<?php

namespace App\Models;

use Domain\Comment\ViewModels\CommentViewModel;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserComment extends Model
{
    protected $table = 'user_comments';

    protected $fillable = [
        'title',
        'stars',
        'phone',
        'email',
        'desc',
        'params',
        'user_id',
    ];

    protected $casts = [
        'params' => 'collection'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
        static::saving(function ($Moonshine) {

            /**
             * пересчитаем звезды и обавим User-у
             */
            if($Moonshine->published) {

                $stars = CommentViewModel::make()->rating($Moonshine->user_id);
                UserViewModel::make()->user_update_stars($Moonshine->user_id, $stars);
            }
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
