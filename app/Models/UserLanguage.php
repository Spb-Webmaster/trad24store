<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserLanguage extends Model
{
    protected $table = 'user_languages';
    protected $fillable = [
        'title',
        'slug'
    ];
    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }


}
