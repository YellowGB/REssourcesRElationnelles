<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;


class CategorieController extends Controller
{
    public function index()
    {
        $categorie = Categorie::all();

        return view('categorie', compact('categorie'));
    }

    public function store(Request $request)
    {
        if(! Gate::allows('create-categories'))
        {
            abort(403);
        }

        $categories = Categorie::create([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return Redirect::to( route('categories.index'))->with('success', 'Ressource modifiée avec succès.');

    }
}
