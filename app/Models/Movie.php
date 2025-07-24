<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name_movie',
        'genre_movie',
        'duration_movie',
    ];
}
