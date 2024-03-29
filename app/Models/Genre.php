<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;

    protected $table = 'genre_table';

    protected $guarded = ['id'];

    use HasFactory;
}
