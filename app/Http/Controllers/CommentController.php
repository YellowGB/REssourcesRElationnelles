<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Ressource;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function comment_create ($id) {

        $ressource = Ressource::findOrFail($id);
        $content    = $ressource->ressourceable;
        $categories = Categorie::all();
        
        return view('ressource', [
            'ressource'     => $ressource,
            'content'       => $content,
            'categories'    => $categories,
        ]
    );
    }

    public function comment_store(Request $request, $id) {

        $ressource = Ressource::findOrFail($id);

        $request->validate([
            'contenu' => 'required|between:1,255',
        ]);
        
        $commentaire = Commentaire::create([
            'content'       => $request->contenu,
            'user_id'       => auth()->user()->id,
            'ressource_id'  => $ressource->id, // on récupère l'id du contenu créé précédemment dans le switch
            'status'        => CommentaireStatus::Published->value,
            'reports'       => 0,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return Redirect::to('ressources/' . $ressource->id)->with('success', 'Commentaire ajouté avec succès.');
    }

    public function response_create ($id) {

        $ressource = Ressource::findOrFail($id);
        $content    = $ressource->ressourceable;
        $categories = Categorie::all();

        return view('ressource', [
            'ressource'     => $ressource,
            'content'       => $content,
            'categories'    => $categories,
        ]
    );
    }
    
    public function responce_store(Request $request, $id, $commentaire) {

        $ressource = Ressource::findOrFail($id);
        $comment = Commentaire::findOrFail($commentaire->id);

        $request->validate([
            'contenu'                 => 'required|between:1,255',
        ]);
        
        $reponse = Commentaire::create([
            'content'       => $request->contenu,
            'user_id'       => auth()->user()->id,
            'ressource_id'  => $ressource->id, // on récupère l'id du contenu créé précédemment dans le switch
            'status'        => CommentaireStatus::Published->value,
            'replies_to'    => $comment->id,
            'reports'       => 0,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return Redirect::to('ressources/' . $ressource->id)->with('success', 'Réponse ajoutée avec succès.');
    }

}
