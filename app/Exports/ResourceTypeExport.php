<?php

namespace App\Exports;

use App\Models\Ressource;
use App\Enums\RessourceType;
use Maatwebsite\Excel\Concerns\FromArray;

class ResourceTypeExport implements FromArray
{
    /**
    * @return Array
    */
    public function array(): array
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

        return [$labels, $counts];
    }
}
