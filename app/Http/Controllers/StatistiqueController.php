<?php

namespace App\Http\Controllers;

use App\Exports\AccountCreationExport;
use App\Exports\FavoritesExport;
use App\Exports\SavedExport;
use App\Exports\SearchTermsExport;
use App\Exports\TopSearchersExport;
use App\Exports\UsedExport;
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
    public function exportTopSearchers(Request $request) {
        return Excel::download(new TopSearchersExport, "top_chercheurs.$request->format");
    }

    /**
     * Exporte les termes les plus recherchés
     * 
     * @since 1.5.0-alpha
     */
    public function exportSearchTerms(Request $request) {
        return Excel::download(new SearchTermsExport, "top_termes_recherches.$request->format");
    }

    /**
     * Exporte les ressources les plus mises en favorites
     * 
     * @since 1.5.0-alpha
     */
    public function exportFavorites(Request $request) {
        return Excel::download(new FavoritesExport, "ressources_favorites.$request->format");
    }

    /**
     * Exporte les ressources les plus mises de côté
     * 
     * @since 1.5.0-alpha
     */
    public function exportSaved(Request $request) {
        return Excel::download(new SavedExport, "ressources_mise_de_cote.$request->format");
    }

    /**
     * Exporte les ressources les plus utilisées
     * 
     * @since 1.5.0-alpha
     */
    public function exportUsed(Request $request) {
        return Excel::download(new UsedExport, "ressources_utilise.$request->format");
    }

    /**
     * Exporte les statistiques des comptes créés sur les derniers mois
     * 
     * @since 1.5.0-alpha
     */
    public function exportAccountCreation(Request $request) {
        return Excel::download(new AccountCreationExport, "creations_comptes.$request->format");
    }
}
