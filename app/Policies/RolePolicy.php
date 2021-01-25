<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public $admin;

    public function __construct()
    {
        $this->admin = Auth::guard('admin')->user();
        //dd($admin);
    }
    public function role_list()
    {
        return $this->admin->Check_Permissions('role-list');
    }
    public function role_add()
    {
        return $this->admin->Check_Permissions('role-add');
    }
    public function role_edit()
    {
        return $this->admin->Check_Permissions('role-edit');
    }
    public function role_delete()
    {
        return $this->admin->Check_Permissions('role-delete');
    }
}
