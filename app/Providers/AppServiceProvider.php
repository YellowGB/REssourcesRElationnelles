<?php

namespace App\Providers;

use App\Enums\RessourceType;
use App\Enums\RessourceRelation;
use App\Models\Categorie;
use ConsoleTVs\Charts\Registrar as Charts;
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
    public function boot(Charts $charts)
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

        View::share('reverse_types', [
            RessourceType::Activite->value   => strtolower(RessourceType::Activite->name),
            RessourceType::Article->value    => strtolower(RessourceType::Article->name),
            RessourceType::Atelier->value    => strtolower(RessourceType::Atelier->name),
            RessourceType::Course->value     => strtolower(RessourceType::Course->name),
            RessourceType::Defi->value       => strtolower(RessourceType::Defi->name),
            RessourceType::Jeu->value        => strtolower(RessourceType::Jeu->name),
            RessourceType::Lecture->value    => strtolower(RessourceType::Lecture->name),
            RessourceType::Photo->value      => strtolower(RessourceType::Photo->name),
            RessourceType::Video->value      => strtolower(RessourceType::Video->name),
        ]);
        
        View::share('relations', [
            RessourceRelation::Self->value,
            RessourceRelation::Spouse->value,
            RessourceRelation::Family->value,
            RessourceRelation::Pro->value,
            RessourceRelation::Friend->value,
            RessourceRelation::Stranger->value,
        ]);

        View::share('categories', Categorie::all());

        $charts->register([
            \App\Charts\SearchTermsChart::class,
            \App\Charts\MostViewedChart::class,
            \App\Charts\TopSearchersChart::class,
            \App\Charts\AccountCreationChart::class,
        ]);
    }
}
