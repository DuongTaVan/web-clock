<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Comment extends Model
{
    protected $table = 'comments';
    public function user(){
        return $this->belongsTo(User::class,'cmt_user_id');
    }
}
