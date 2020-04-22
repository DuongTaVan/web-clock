<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $fillable = [
        'trm_name',
        'trm_slug',
        'image'
    ];
}
