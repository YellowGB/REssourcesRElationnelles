<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;

class UserResourcesExport implements FromArray
{
    /**
    * @return Array
    */
    public function array(): array
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

        return [$labels, $counts];
    }
}
