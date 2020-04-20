<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public function permission(){
        return $this->belongsToMany('App\Models\Permission','roles_permission','role_id','permission_id');
    }
}
