<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosterGenre extends Model
{
    public $timestamps = false;

    protected $table = 'posters_genres';

    protected $guarded = ['id'];

    use HasFactory;
}
