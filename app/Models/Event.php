<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'ev_name',
        'ev_slug',
        'ev_image',
        'location'
    ];
}
