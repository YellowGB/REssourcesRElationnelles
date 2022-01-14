<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function index() {

        $ressources = Ressource::all();
        // $contents   = array();
        // foreach ($ressources as $ressource) {
        //     array_push($contents, $ressource->ressourceable);
        // }

        return view('catalogue', compact(
            'ressources',
            // 'contents',
        ));
    }

    public function show($id) {

        $ressource  = Ressource::findOrFail($id);
        $content    = $ressource->ressourceable;

        return view('ressource', [
            'ressource' => $ressource,
            'content'   => $content,
        ]);
    }
}
