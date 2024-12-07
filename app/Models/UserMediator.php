<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMediator extends Model
{
    protected $table = 'user_mediators';

    protected $fillable = [
        'title',
        'sem',
        'ugo',
        'gra',
        'uve',
        'kor',
        'tru',
        'ban',
        'desc',
        'params',
        'user_id'
    ];
    protected $casts = [
        'params' => 'collection'
    ];


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
        static::saving(function ($Moonshine) {
            $Moonshine->title = $Moonshine->user->name . ': '. rusdate_month($Moonshine->created_at) ;

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
