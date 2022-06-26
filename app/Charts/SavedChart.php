<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Progression;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;

class SavedChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $progression = Progression::where('is_saved', true)
                                    ->get()
                                    ->countBy('ressource_id')
                                    ->sortDesc()
                                    ->slice(0, $request->number);
        
        $labels = [];
        $counts = [];
        foreach ($progression as $k => $v) {
            array_push($labels, $k);
            array_push($counts, $v);
        }

        return Chartisan::build()
            ->labels($labels)
            ->extra(['colors' => config('charts.colors.shading.teal')])
            ->dataset('Sample 2', $counts);
    }
}