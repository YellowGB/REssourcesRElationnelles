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

        // Roles
        Blade::directive('modo', function() {
            return "<?php if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Gate::allows('publish-ressources')) : ?>";
        });
        Blade::directive('endmodo', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('admin', function() {
            return "<?php if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Gate::allows('access-admin')) : ?>";
        });
        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('superadmin', function() {
            return "<?php if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Gate::allows('remove-user')) : ?>";
        });
        Blade::directive('endsuperadmin', function () {
            return "<?php endif; ?>";
        });
    }
}
