<?php

namespace App\Providers;

use App\Enums\RessourceType;
use App\Enums\RessourceRelation;
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
            RessourceType::Activite->name   => RessourceType::Activite->value,
            RessourceType::Article->name    => RessourceType::Article->value,
            RessourceType::Atelier->name    => RessourceType::Atelier->value,
            RessourceType::Course->name     => RessourceType::Course->value,
            RessourceType::Defi->name       => RessourceType::Defi->value,
            RessourceType::Jeu->name        => RessourceType::Jeu->value,
            RessourceType::Lecture->name    => RessourceType::Lecture->value,
            RessourceType::Photo->name      => RessourceType::Photo->value,
            RessourceType::Video->name      => RessourceType::Video->value,
        ]);
        
        View::share('relations', [
            RessourceRelation::Self->value,
            RessourceRelation::Spouse->value,
            RessourceRelation::Family->value,
            RessourceRelation::Pro->value,
            RessourceRelation::Friend->value,
            RessourceRelation::Stranger->value,
        ]);
    }
}
