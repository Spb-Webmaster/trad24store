<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diplom extends Model
{
    protected $table = 'diploms';
    protected $fillable = [
        'title',
        'training',
        'date',
        'name',
        'published',
    ];
}
