<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Events\CommentReported;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    public function show($id) {
        $commentaire = Commentaire::findOrFail($id);

        return view('commentaire-moderation', compact(
            'commentaire',
        ));
    }
    
    public function report($id) {

        $commentaire = Commentaire::findOrFail($id);
        
        $commentaire->reports++;
        $commentaire->update();

        // Dès que le commentaire atteind 50 reports on envoie une notification aux modérateurs
        if ($commentaire->reports == 50) {
            event(new CommentReported($commentaire));
        }

        // On rafraichit simplement la page pour le moment (AJAX à l'avenir)
        return redirect()->route('resources.show', ['id' => $commentaire->ressource_id]);
    }

    public function moderation() {

        $commentaires = Commentaire::where('reports', '>=','50')->get();
        $user = User::where('id', 1)->get();

        return view('commentaires-moderation', compact(
            'commentaires',
        ));
    }

    public function ignorer($id) {

        $commentaire = Commentaire::findOrFail($id);

        $commentaire->reports = 0;

        $commentaire->update();

        event(new CommentIgnored($commentaire));

        return Redirect::to('commentaire/moderation')->with('success', 'Ressource ignorée avec succès.');
    }

    public function supprimer($id) {

        $commentaire = Commentaire::findOrfail($id);

        $commentaire->update();
        $commentaire->delete();

        event(new CommentDeleted($commentaire));

        return Redirect::to('commentaire/moderation')->with('success', 'Ressource rejetée avec succès.');
    }
}
