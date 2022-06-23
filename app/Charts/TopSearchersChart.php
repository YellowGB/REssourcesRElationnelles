<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class TopSearchersChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $stats  = User::orderBy('search_count', 'desc')->limit($request->number)->get();
        $labels = [];
        $counts = [];

        foreach ($stats as $stat) {
            array_push($labels, get_user_display_name($stat));
            array_push($counts, $stat->search_count);
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset(__('titles.chart.dataset.terms'), $counts);
    }
}