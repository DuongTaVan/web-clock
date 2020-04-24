<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{Category,Menus};
use View;

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
        View::share('category',$category);
        View::share('menus',$menus);

    }
}
