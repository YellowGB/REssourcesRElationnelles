<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    public function store(Request $request, $id, $commentaire) {

        $request->validate([
            'content'                 => 'required|between:1,255',
        ]);
        
        $comment = Commentaire::create([
            'content'       => $request->content,
            'user_id'       => auth()->user()->id,
            'ressource_id'  => $id,
            // 'status'        => CommentaireStatus::Published->value,
            'replies_to'    => $commentaire,
            'reports'       => 0,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return Redirect::to('ressources/' . $id)->with('success', 'Réponse ajoutée avec succès.');
    }

}
