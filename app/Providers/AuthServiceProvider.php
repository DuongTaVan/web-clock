<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGate();

    }
    public function defineGate(){
        Gate::define('category','App\Policies\ManageShopPolicy@category');
        Gate::define('article','App\Policies\ManageShopPolicy@article');
        Gate::define('attribute','App\Policies\ManageShopPolicy@attribute');
        Gate::define('statistical','App\Policies\ManageShopPolicy@statistical');
        Gate::define('warehouse','App\Policies\ManageShopPolicy@warehouse');
        Gate::define('menu','App\Policies\ManageShopPolicy@menu');
        Gate::define('write-blog','App\Policies\ManageShopPolicy@write_blog');
        Gate::define('key','App\Policies\ManageShopPolicy@key');
        Gate::define('transport','App\Policies\ManageShopPolicy@transport');
        Gate::define('transaction','App\Policies\ManageShopPolicy@transaction');
        Gate::define('product','App\Policies\ManageShopPolicy@product');
        Gate::define('user','App\Policies\ManageShopPolicy@user');
        Gate::define('rating','App\Policies\ManageShopPolicy@rating');
        Gate::define('trademark','App\Policies\ManageShopPolicy@trademark');
        Gate::define('permission','App\Policies\ManageShopPolicy@permission');
        Gate::define('event','App\Policies\ManageShopPolicy@event');
        Gate::define('slide','App\Policies\ManageShopPolicy@slide');
        Gate::define('admin-list','App\Policies\AdminPolicy@admin_list');
        Gate::define('admin-add','App\Policies\AdminPolicy@admin_add');
        Gate::define('admin-edit','App\Policies\AdminPolicy@admin_edit');
        Gate::define('admin-delete','App\Policies\AdminPolicy@admin_delete');
        Gate::define('role-list','App\Policies\RolePolicy@role_list');
        Gate::define('role-add','App\Policies\RolePolicy@role_add');
        Gate::define('role-edit','App\Policies\RolePolicy@role_edit');
        Gate::define('role-delete','App\Policies\RolePolicy@role_delete');
    }
}
