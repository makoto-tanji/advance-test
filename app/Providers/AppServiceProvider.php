<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//以下追加
use Illuminate\Pagination\Paginator;

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
        //
        // Paginator::useBootstrap();
    }
}
