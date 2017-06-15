<?php

namespace App\Providers;

use App\Helpers\NetLicensing\NetLicensing;
use Illuminate\Support\ServiceProvider;

class NetLicensingProvider extends ServiceProvider
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
        $this->app->bind('netlicensing', NetLicensing::class);
    }
}
