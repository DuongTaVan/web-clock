<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * Admins table.
     *
     * @var string
     */
    protected $table = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function role()
    {
        return $this->belongsToMany('App\Models\Role', 'App\Models\Role_admin', 'admin_id', 'role_id');
    }

    public function Check_Permissions($checkPermission)
    {
        $roles = \Auth::guard('admin')->user()->role;
        //dd($roles);
        foreach ($roles as $role) {
            $permissions = $role->permission;
            if ($permissions->contains('name', $checkPermission)) {
                return true;
            }
        }
        return false;
    }
}
