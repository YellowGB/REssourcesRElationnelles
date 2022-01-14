<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Article;
use App\Models\Atelier;
use App\Models\Categorie;
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

    public function create() {

        $categories = Categorie::all();

        return view('creation-ressource', [
            'categories' => $categories,
        ]
    );
    }

    public function store( Request $request ) {

        switch ($request->ressourceable_type) {

            case 'App\Models\Activite':
                $content = Activite::create([
                    'description'   => $request->activite_description,
                    'starting_date' => $request->activite_starting_date,
                    'duration'      => $request->activite_duration,
                ]);
                break;
            case 'App\Models\Article':
                $content = Article::create([
                    'source_url' => $request->article_source_url,
                ]);
                break;
            case 'App\Models\Atelier':
                $content = Atelier::create([
                    'description' => $request->atelier_description,
                ]);
                break;
            case 'App\Models\Course':
                break;
            case 'App\Models\Defi':
                break;
            case 'App\Models\Jeu':
                break;
            case 'App\Models\Lecture':
                break;
            case 'App\Models\Photo':
                break;
            case 'App\Models\Video':
                break;
        }

        Ressource::create([
            'title'                 => $request->title,
            'ressourceable_type'    => $request->ressourceable_type,
            'ressourceable_id'      => $content->id, // on récupère l'id du contenu créé précédemment dans le switch
            'relation'              => $request->relation,
            'user_id'               => 1,
            'categorie_id'          => $request->categorie_id,
            'status'                => 'pending',
            'restriction'           => 'public',
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
    }
}
