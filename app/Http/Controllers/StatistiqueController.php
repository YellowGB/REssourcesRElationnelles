<?php

namespace App\Http\Controllers;

use App\Exports\TopSearchersExport;
use App\Models\Statistique;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stats');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistique  $statistique
     * @return \Illuminate\Http\Response
     */
    public function show(Statistique $statistique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statistique  $statistique
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistique $statistique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistique  $statistique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistique $statistique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistique  $statistique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistique $statistique)
    {
        //
    }

    /**
     * Exporte les utilisateurs ayant effectué le plus de recherches
     * 
     * @since 1.5.0-alpha
     */
    public function exportTopSearchers() {
        return Excel::download(new TopSearchersExport, 'topsearchers.csv');
    }
}
