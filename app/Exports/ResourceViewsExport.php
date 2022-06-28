<?php

namespace App\Exports;

use App\Models\Ressource;
use Maatwebsite\Excel\Concerns\FromArray;

class ResourceViewsExport implements FromArray
{
    /**
    * @return Array
    */
    public function array(): array
    {
        $statsHigh  = Ressource::orderBy('count', 'desc')->limit(10)->get();
        $statsLow   = Ressource::orderBy('count', 'asc')->limit(10)->get();
        $countsHigh = [];
        $countsLow  = [];
        $labels     = [];

        foreach ($statsHigh as $stat) array_push($countsHigh, $stat->count);
        foreach ($statsLow as $stat) array_push($countsLow, $stat->count);
        for ($i = 1; $i <= 10; $i++) array_push($labels, $i);

        return [$labels, $countsHigh, $countsLow];
    }
}
