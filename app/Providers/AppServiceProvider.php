<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share('types', [
            'App\Models\Activite',
            'App\Models\Article',
            'App\Models\Atelier',
            'App\Models\Course',
            'App\Models\Defi',
            'App\Models\Jeu',
            'App\Models\Lecture',
            'App\Models\Photo',
            'App\Models\Video',
        ]);
        
        View::share('relations', [
            'self',
            'spouse',
            'family',
            'pro',
            'friend',
            'stranger',
        ]);
    }
}
