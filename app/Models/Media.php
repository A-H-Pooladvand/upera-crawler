<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'media_table';

    protected $guarded = ['id'];
}
