<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class AccountCreationChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $weeks  = [];
        $labels = [];
        // On multiplie par 4 pour obtenir le nombre de semaines, puisque c'est le nombre de mois souhaités qui est passé en paramètres
        for ($i = (int) $request->number * 4; $i > 0; $i--) { 
            $week = User::where('created_at', '>=', Carbon::now()->subWeeks($i))
                        ->where('created_at', '<', Carbon::now()->subWeeks($i - 1))
                        ->get();
            array_push($weeks, $week->count());
            array_push($labels, Carbon::now()->subWeeks($i)->startOfWeek()->format('d/m/y'));
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset(__('titles.chart.dataset.accounts'), $weeks);
    }
}