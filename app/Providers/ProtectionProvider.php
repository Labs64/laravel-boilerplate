<?php

namespace App\Providers;

use App\Helpers\Protection\NetLicensing;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ProtectionProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('netlicensing', NetLicensing::class);

        Blade::directive('protection', function ($productModuleNumber) {
            return "<?php if(auth()->check() && auth()->user()->hasAccess('$productModuleNumber')): ?>";
        });

        Blade::directive('elseifprotection', function ($productModuleNumber) {
            return "<?php elseif(auth()->check() && auth()->user()->hasAccess('$productModuleNumber')): ?>";
        });

        Blade::directive('elseprotection', function () {
            return '<?php else: ?>';
        });

        Blade::directive('endprotection', function () {
            return '<?php endif; ?>';
        });
    }
}
