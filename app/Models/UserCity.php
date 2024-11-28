<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserCity extends Model
{
    protected $table = 'user_cities';

    protected $fillable = [
        'title'
    ];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
