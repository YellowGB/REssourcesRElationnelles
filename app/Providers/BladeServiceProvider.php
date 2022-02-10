<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Creation
        Blade::directive('create', function ($expression) {
            return "<?php if (! isset($expression)) : ?>";
        });

        Blade::directive('endcreate', function () {
            return "<?php endif; ?>";
        });

        // Edition
        Blade::directive('edit', function ($expression) {
            return "<?php if (isset($expression)) : ?>";
        });

        Blade::directive('endedit', function () {
            return "<?php endif; ?>";
        });
    }
}
