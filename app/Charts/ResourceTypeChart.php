<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Ressource;
use App\Enums\RessourceType;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;

class ResourceTypeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $counts = [];
        $labels = [];
        $types  = [
            RessourceType::Activite->name   => RessourceType::Activite->value,
            RessourceType::Article->name    => RessourceType::Article->value,
            RessourceType::Atelier->name    => RessourceType::Atelier->value,
            RessourceType::Course->name     => RessourceType::Course->value,
            RessourceType::Defi->name       => RessourceType::Defi->value,
            RessourceType::Jeu->name        => RessourceType::Jeu->value,
            RessourceType::Lecture->name    => RessourceType::Lecture->value,
            RessourceType::Photo->name      => RessourceType::Photo->value,
            RessourceType::Video->name      => RessourceType::Video->value,
        ];

        foreach ($types as $type) {
            array_push($labels, __('titles.type.' . $type));
            array_push($counts, Ressource::where('ressourceable_type', $type)->count());
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset(__('titles.chart.dataset.resources'), $counts);
    }
}