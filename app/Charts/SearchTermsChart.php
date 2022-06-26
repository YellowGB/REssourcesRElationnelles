<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Statistique;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class SearchTermsChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $stats  = Statistique::orderBy('search_count', 'desc')->limit($request->number)->get();
        $labels = [];
        $counts = [];

        foreach ($stats as $stat) {
            array_push($labels, $stat->search_term);
            array_push($counts, $stat->search_count);
        }

        return Chartisan::build()
            ->labels($labels)
            ->extra(['colors' => config('charts.colors.shading.blue')])
            ->dataset(__('titles.chart.dataset.terms'), $counts);
    }
}