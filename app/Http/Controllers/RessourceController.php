<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Article;
use App\Models\Atelier;
use App\Models\Course;
use App\Models\Defi;
use App\Models\Jeu;
use App\Models\Lecture;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Categorie;
use App\Models\Ressource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        // On crée d'abord le contenu
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
                $content = Course::create([
                    'file_uri'  => $request->course_file_uri,
                    'file_name' => $request->course_file_name,
                ]);
                break;
            case 'App\Models\Defi':
                $content = Defi::create([
                    'description'   => $request->defi_description,
                    'bonus'         => $request->defi_bonus,
                ]);
                break;
            case 'App\Models\Jeu':
                $content = Jeu::create([
                    'description'   => $request->jeu_description,
                    'starting_date' => $request->jeu_starting_date,
                    'link'          => $request->jeu_link,
                ]);
                break;
            case 'App\Models\Lecture':
                $content = Lecture::create([
                    'title'     => $request->lecture_title,
                    'author'    => $request->lecture_author,
                    'year'      => $request->lecture_year,
                    'summary'   => $request->lecture_summary,
                    'analysis'  => $request->lecture_analysis,
                    'review'    => $request->lecture_review,
                ]);
                break;
            case 'App\Models\Photo':
                $content = Photo::create([
                    'file_uri'      => $request->photo_file_uri,
                    'photo_author'  => $request->photo_author,
                    'legend'        => $request->photo_legend,
                ]);
                break;
            case 'App\Models\Video':
                $content = Video::create([
                    'file_uri'  => $request->video_file_uri,
                    'link'      => $request->video_link,
                    'legend'    => $request->video_legend,
                ]);
                break;
        }

        // On crée ensuite la ressource
        $ressource = Ressource::create([
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

        return Redirect::to('ressources/' . $ressource->id)->with('success', 'Ressource modifiée avec succès.');
    }


    public function edit($id) {

        $ressource  = Ressource::findOrFail($id);
        $content    = $ressource->ressourceable;
        $categories = Categorie::all();
        $relations  = [
            'self',
            'spouse',
            'family',
            'pro',
            'friend',
            'stranger',
        ];
        $types      = [
            'App\Models\Activite',
            'App\Models\Article',
            'App\Models\Atelier',
            'App\Models\Course',
            'App\Models\Defi',
            'App\Models\Jeu',
            'App\Models\Lecture',
            'App\Models\Photo',
            'App\Models\Video',
        ];

        return view('edition-ressource', [
            'ressource'     => $ressource,
            'content'       => $content,
            'categories'    => $categories,
            'relations'     => $relations,
        ]
    );
    }

    public function update( Request $request, $id ) {

        // On prépare la mise à jour du contenu
        switch ($request->ressourceable_type) {

            case 'App\Models\Activite':
                $content = Activite::findOrFail($request->ressourceable_id);

                $content->description   = $request->activite_description;
                $content->starting_date = $request->activite_starting_date;
                $content->duration      = $request->activite_duration;
                break;
            case 'App\Models\Article':
                $content = Article::findOrFail($request->ressourceable_id);

                $content->source_url = $request->article_source_url;
                break;
            case 'App\Models\Atelier':
                $content = Atelier::findOrFail($request->ressourceable_id);

                $content->description = $request->atelier_description;
                break;
            case 'App\Models\Course':
                $content = Course::findOrFail($request->ressourceable_id);

                $content->file_uri  = $request->course_file_uri;
                $content->file_name = $request->course_file_name;
                break;
            case 'App\Models\Defi':
                $content = Defi::findOrFail($request->ressourceable_id);

                $content->description   = $request->defi_description;
                $content->bonus         = $request->defi_bonus;
                break;
            case 'App\Models\Jeu':
                $content = Jeu::findOrFail($request->ressourceable_id);

                $content->description   = $request->jeu_description;
                $content->starting_date = $request->jeu_starting_date;
                $content->link          = $request->jeu_link;
                break;
            case 'App\Models\Lecture':
                $content = Lecture::findOrFail($request->ressourceable_id);

                $content->title     = $request->lecture_title;
                $content->author    = $request->lecture_author;
                $content->year      = $request->lecture_year;
                $content->summary   = $request->lecture_summary;
                $content->analysis  = $request->lecture_analysis;
                $content->review    = $request->lecture_review;
                break;
            case 'App\Models\Photo':
                $content = Photo::findOrFail($request->ressourceable_id);

                $content->file_uri      = $request->photo_file_uri;
                $content->photo_author  = $request->photo_author;
                $content->legend        = $request->photo_legend;
                break;
            case 'App\Models\Video':
                $content = Video::findOrFail($request->ressourceable_id);

                $content->file_uri  = $request->video_file_uri;
                $content->link      = $request->video_link;
                $content->legend    = $request->video_legend;
                break;
        }
        // On met à jour le contenu défini dans le switch
        $content->update();

        // On met à jour la ressource
        $ressource = Ressource::findOrFail($id);

        $ressource->title           = $request->title;
        $ressource->relation        = $request->relation;
        $ressource->categorie_id    = $request->categorie_id;
        $ressource->status          = 'pending';
        $ressource->restriction     = 'public';
        $ressource->updated_at      = now();

        $ressource->update();

        return Redirect::to('ressources/' . $id)->with('success', 'Ressource modifiée avec succès.');
    }
}
