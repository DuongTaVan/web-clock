<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    public function menu(){
        return $this->belongsTo(Menus::class,'a_menu_id');
    }
}
