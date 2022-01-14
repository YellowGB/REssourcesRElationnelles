<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function index() {

        $activite   = Activite::find(1);
        $content    = $activite->ressource;

        return view('catalogue', compact(
            'activite',
            'content',
        ));
    }
}
