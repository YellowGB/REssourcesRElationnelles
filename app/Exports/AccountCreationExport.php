<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;

class AccountCreationExport implements FromArray
{
    /**
    * @return Array
    */
    public function array(): array
    {
        $weeks  = [];
        $labels = [];
        // On multiplie par 4 pour obtenir le nombre de semaines, puisque c'est le nombre de mois souhaités qui est passé en paramètres
        for ($i = (int) 3 * 4; $i > 0; $i--) { 
            $week = User::where('created_at', '>=', Carbon::now()->subWeeks($i))
                        ->where('created_at', '<', Carbon::now()->subWeeks($i - 1))
                        ->get();
            array_push($weeks, $week->count());
            array_push($labels, Carbon::now()->subWeeks($i)->startOfWeek()->format('d/m/y'));
        }

        return [$labels, $weeks];
    }
}
