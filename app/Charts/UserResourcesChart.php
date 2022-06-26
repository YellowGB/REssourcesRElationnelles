<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class UserResourcesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $users      = User::all();
        $resources  = [];
    
        foreach ($users as $user) $resources[get_user_display_name($user)] = $user->ressources->count();
        $resources = collect($resources)->sortDesc()->slice(0, 10);

        $labels = [];
        $counts = [];
        foreach ($resources as $k => $v) {
            array_push($labels, $k);
            array_push($counts, $v);
        }

        return Chartisan::build()
            ->labels($labels)
            ->extra(['colors' => config('charts.colors.shading.blue')])
            ->dataset(__('titles.chart.dataset.resources'), $counts);
    }
}