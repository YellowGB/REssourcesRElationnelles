<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class UsersGeoChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $geos = User::all();
        $postcodes = [];
        foreach ($geos as $geo) array_push($postcodes, $geo->postcode);
        $geos = collect($postcodes)->countBy();
        $geos = $geos->sortDesc()->slice(0, $request->number);

        $labels = [];
        $counts = [];
        foreach ($geos as $k => $v) {
            array_push($labels, $k);
            array_push($counts, $v);
        }

        return Chartisan::build()
            ->labels($labels)
            ->extra(['colors' => config('charts.colors.pie.default')])
            ->dataset('', $counts);
    }
}