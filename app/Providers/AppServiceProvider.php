<?php

namespace App\Providers;

use App\Models\Notification;
use App\User;
use Illuminate\Support\ServiceProvider;
use App\Models\{Admin, Category, Menus};
use View;
use Auth;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menus = Menus::all();
        $category = Category::all();
        $notifications = Notification::orderby('id', 'DESC')->take(5)->get();
        View::share('category', $category);
        View::share('menus', $menus);
        View::share('notifications', $notifications);
        Validator::extend('recaptcha', 'App\Validators\Recaptcha@validate');
//        view()->composer('*', function ($view) {
//            if (Auth::check()) {
//                $id = Auth::guard('admin')->user()->id;
//                dd($id);
//                $listRolesadmin = Admin::findOrFail($id)->role()->select('roles.name')->pluck('name')->toArray();
//                //dd($listRolesadmin);
//                view()->share('listRolesadmin', $listRolesadmin);
//            } else {
//                \redirect()->route('admin.account.index');
//            }
//        });
    }
}
