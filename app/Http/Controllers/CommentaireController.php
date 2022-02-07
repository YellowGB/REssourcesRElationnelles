<?php

namespace App\Http\Controllers;

use App\Events\CommentReported;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    public function report($id) {

        $commentaire  = Commentaire::findOrFail($id);
        
        $commentaire->reports++;
        $commentaire->update();

        event(new CommentReported($commentaire));

        // On rafraichit simplement la page pour le moment (AJAX à l'avenir)
        return redirect()->route('resources.show', ['id' => $commentaire->ressource_id]);
    }
}
