<?php

namespace App\Exports;

use App\Models\Progression;
use Maatwebsite\Excel\Concerns\FromCollection;

class FavoritesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Progression::where('is_favorite', true)
                            ->get()
                            // ->countBy('ressource_id')
                            ->sortDesc()
                            ->slice(0, 10);
    }
}
