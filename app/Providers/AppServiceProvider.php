<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Support\ServiceProvider;

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
        \View::composer('includes.header', function ($view) {
            $view->with(['categories' => Category::all(),'collections'=>Collection::all()]);
        });
    }
}
