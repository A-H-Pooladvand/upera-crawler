<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    protected $casts = [
        'enabled' => 'boolean'
    ];

    public $timestamps = false;

    protected $table = 'poster_table';

    protected $guarded = ['id'];
}
