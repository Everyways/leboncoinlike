<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

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
        Blade::if ('admin', function () {
            return auth()->check() && auth()->user()->admin;
        });
        
        Route::resourceVerbs([
            'create' => 'creer',
            'edit' => 'modifier',
        ]);
    }
}
