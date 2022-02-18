<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Events\CommentReported;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'content' => 'required|between:1,255',
        ]);
        
        Commentaire::create([
            'content'       => $request->content,
            'user_id'       => auth()->user()->id,
            'ressource_id'  => $request->id,
            // 'status'        => CommentaireStatus::Published->value,
            'replies_to'    => $request->commentaire,
            'reports'       => 0,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return Redirect::to(route('resources.show', ['id' => $request->id]))->with('success', 'Réponse ajoutée avec succès.');
    }

    public function report($id) {

        $commentaire  = Commentaire::findOrFail($id);
        
        $commentaire->reports++;
        $commentaire->update();

        event(new CommentReported($commentaire));

        // On rafraichit simplement la page pour le moment (AJAX à l'avenir)
        return redirect()->route('resources.show', ['id' => $commentaire->ressource_id]);
    }
}
