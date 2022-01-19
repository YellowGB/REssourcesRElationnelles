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


    public function edit($id) {

        $ressource  = Ressource::findOrFail($id);
        $content    = $ressource->ressourceable;

        return view('edition-ressource', [
            'ressources' => $ressource,
        ]
    );
    }

    public function change( Request $request ) {

        switch ($request->ressourceable_type) {

            case 'App\Models\Activite':
                $content = Activite::edit([
                    'description'   => $request->activite_description,
                    'starting_date' => $request->activite_starting_date,
                    'duration'      => $request->activite_duration,
                ]);
                break;
            case 'App\Models\Article':
                $content = Article::edit([
                    'source_url' => $request->article_source_url,
                ]);
                break;
            case 'App\Models\Atelier':
                $content = Atelier::edit([
                    'description' => $request->atelier_description,
                ]);
                break;
            case 'App\Models\Course':
                $content = Course::edit([
                    'file_uri'  => $request->course_file_uri,
                    'file_name' => $request->course_file_name,
                ]);
                break;
            case 'App\Models\Defi':
                $content = Defi::edit([
                    'description'   => $request->defi_description,
                    'bonus'         => $request->defi_bonus,
                ]);
                break;
            case 'App\Models\Jeu':
                $content = Jeu::edit([
                    'description'   => $request->jeu_description,
                    'starting_date' => $request->jeu_starting_date,
                    'link'          => $request->jeu_link,
                ]);
                break;
            case 'App\Models\Lecture':
                $content = Lecture::edit([
                    'title'     => $request->lecture_title,
                    'author'    => $request->lecture_author,
                    'year'      => $request->lecture_year,
                    'summary'   => $request->lecture_summary,
                    'analysis'  => $request->lecture_analysis,
                    'review'    => $request->lecture_review,
                ]);
                break;
            case 'App\Models\Photo':
                $content = Photo::edit([
                    'file_uri'      => $request->photo_file_uri,
                    'photo_author'  => $request->photo_author,
                    'legend'        => $request->photo_legend,
                ]);
                break;
            case 'App\Models\Video':
                $content = Video::edit([
                    'file_uri'  => $request->video_file_uri,
                    'link'      => $request->video_link,
                    'legend'    => $request->video_legend,
                ]);
                break;
        }

        Ressource::edit([
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
