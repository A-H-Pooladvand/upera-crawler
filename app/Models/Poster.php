<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'poster_table';

    protected $guarded = ['id'];
}
