<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ManageShopPolicy
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

    public function permission()
    {
        return $this->admin->Check_Permissions('permission');
    }

    public function category()
    {
        return $this->admin->Check_Permissions('category');
    }

    public function statistical()
    {
        return $this->admin->Check_Permissions('statistical');
    }

    public function warehouse()
    {
        return $this->admin->Check_Permissions('warehouse');
    }

    public function transaction()
    {
        return $this->admin->Check_Permissions('transaction');
    }

    public function attribute()
    {
        return $this->admin->Check_Permissions('attribute');
    }

    public function menu()
    {
        return $this->admin->Check_Permissions('menu');
    }

    public function write_blog()
    {
        return $this->admin->Check_Permissions('write-blog');
    }

    public function key()
    {
        return $this->admin->Check_Permissions('key');
    }

    public function transport()
    {
        return $this->admin->Check_Permissions('transport');
    }

    public function article()
    {
        return $this->admin->Check_Permissions('article');
    }

    public function product()
    {
        return $this->admin->Check_Permissions('product');
    }

    public function user()
    {
        return $this->admin->Check_Permissions('user');
    }

    public function event()
    {
        return $this->admin->Check_Permissions('event');
    }

    public function rating()
    {
        return $this->admin->Check_Permissions('rating');
    }

    public function trademark()
    {
        return $this->admin->Check_Permissions('trademark');
    }

    public function slide()
    {
        return $this->admin->Check_Permissions('slide');
    }
}
