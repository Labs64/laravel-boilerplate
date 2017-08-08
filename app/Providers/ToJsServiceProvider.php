<?php

namespace App\Providers;

use App\Helpers\ToJs\ToJs;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ToJsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tojs', function () {
            return new ToJs();
        });

//        app('tojs')->put()
//
//        Lang
        /*
        * The block of code inside this directive indicates
        * the chosen javascript variables.
        */
        Blade::directive('tojs', function () {
            return '<script> window.Laravel = ' . json_encode(app('tojs')->get()) . '</script>';
        });
    }
}
