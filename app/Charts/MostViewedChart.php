<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Ressource;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class MostViewedChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $statsHigh  = Ressource::orderBy('count', 'desc')->limit($request->number)->get();
        $statsLow   = Ressource::orderBy('count', 'asc')->limit($request->number)->get();
        $countsHigh = [];
        $countsLow  = [];
        $labels     = [];

        foreach ($statsHigh as $stat) array_push($countsHigh, $stat->count);
        foreach ($statsLow as $stat) array_push($countsLow, $stat->count);
        for ($i = 1; $i <= $request->number; $i++) array_push($labels, $i);

        return Chartisan::build()
            ->labels($labels)
            ->extra([
                'colors1' => config('charts.colors.pie.revert'),
                'colors2' => config('charts.colors.pie.default'),
            ])
            ->dataset('Les plus consultées', $countsHigh) // la localization ne fonctionne pas lorsqu'il y a plus d'un dataset
            ->dataset('Les moins consultées', $countsLow);
    }
}