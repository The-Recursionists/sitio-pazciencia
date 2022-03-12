<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

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
        Blade::if('role', function ($value) {
            if (is_array($value))
                return Auth::check() && in_array(Auth::user()->role->name, $value);
            if (is_string($value))
                return Auth::check() && Auth::user()->role->name == $value;
        });

        Paginator::useBootstrap();
    }
}
