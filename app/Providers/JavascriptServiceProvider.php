<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use App\Helpers\Javascript\Javascript;
use Illuminate\Support\ServiceProvider;

class JavascriptServiceProvider extends ServiceProvider
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
        $this->app->singleton('javascript', function () {
            return new Javascript();
        });

        /*
        * The block of code inside this directive indicates
        * the chosen javascript variables.
        */
        Blade::directive('javascript', function () {
            return '<script> window.Laravel = ' . json_encode(javascript()->get()) . '</script>';
        });
    }
}
