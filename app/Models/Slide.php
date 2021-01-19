<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        's_name',
        's_slug',
        's_image',
        's_hot',
        's_active'
    ];
}
