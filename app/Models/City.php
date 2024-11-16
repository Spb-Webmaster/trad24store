<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{

    protected $fillable  = [
        'city',
        'phone',
        'sorting',

    ];
    /**
     * relative
     */
    public function contact():HasMany
    {
        return $this->hasMany(Contact::class);
    }

    protected static function boot()
    {
        parent::boot();


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
