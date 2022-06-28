<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersGeoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $geos = User::all();
        $postcodes = [];
        foreach ($geos as $geo) array_push($postcodes, $geo->postcode);
        // $geos = collect($postcodes)->countBy();
        $geos = $geos->sortDesc()->slice(0, 10);

        return $geos;
    }
}
