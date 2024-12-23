<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserToken extends Model
{
    protected $table = 'user_tokens';

    protected $fillable = [
        'token',
        'published',
        'user_id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
