<?php

namespace App\Providers;

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
    }
}
