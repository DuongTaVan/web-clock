<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class RepComment extends Model
{
    protected $table = 'rep_comments';
    public function user(){
        return $this->belongsTo(User::class,'rcmt_user_id');
    }
}
