<?php

namespace App\Exports;

use App\Models\Statistique;
use Maatwebsite\Excel\Concerns\FromCollection;

class SearchTermsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Statistique::orderBy('search_count', 'desc')->limit(10)->get();
    }
}
