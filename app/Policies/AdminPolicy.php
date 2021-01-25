<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
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
    public function admin_list()
    {
        return $this->admin->Check_Permissions('admin-list');
    }
    public function admin_add()
    {
        return $this->admin->Check_Permissions('admin-add');
    }
    public function admin_edit()
    {
        return $this->admin->Check_Permissions('admin-edit');
    }
    public function admin_delete()
    {
        return $this->admin->Check_Permissions('admin-delete');
    }
}
