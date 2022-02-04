<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\Defi;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Course;
use App\Models\Article;
use App\Models\Atelier;
use App\Models\Lecture;
use App\Models\Activite;
use App\Models\Categorie;
use App\Models\Ressource;
use App\Enums\RessourceType;
use Illuminate\Http\Request;
use App\Enums\RessourceStatus;
use App\Enums\RessourceRestriction;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class RessourceController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth')->except([
            'index',
            'show',
        ]);
    }

    public function index() {

        $ressources = Ressource::all();

        return view('catalogue', compact(
            'ressources',
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

        if (! Gate::allows('create-ressources')) {
            abort(403);
        }

        $categories = Categorie::all();

        return view('creation-ressource', [
            'categories' => $categories,
        ]);
    }

    public function store( Request $request ) {

        // On valide les champs de la ressource
        $request->validate([
            'title'                 => 'required|between:5,255',
            'ressourceable_type'    => 'required',
            'relation'              => 'required',
            'categorie_id'          => 'required',
        ]);

        // On crée d'abord le contenu (après avoir validé ses champs également)
        switch ($request->ressourceable_type) {

            case RessourceType::Activite->value:
                $request->validate([
                    'activite_description'      => 'required|between:20,1000',
                    'activite_starting_date'    => 'required|date|after:today',
                    'activite_duration'         => 'required|integer|gt:10|lte:240',
                ]);

                $content = Activite::create([
                    'description'   => $request->activite_description,
                    'starting_date' => $request->activite_starting_date,
                    'duration'      => $request->activite_duration,
                ]);
                break;
            case RessourceType::Article->value:
                $request->validate([
                    'article_source_url' => 'required',
                ]);
                
                $content = Article::create([
                    'source_url' => $request->article_source_url,
                ]);
                break;
            case RessourceType::Atelier->value:
                $request->validate([
                    'atelier_description' => 'required|between:50,2000',
                ]);
                
                $content = Atelier::create([
                    'description' => $request->atelier_description,
                ]);
                break;
            case RessourceType::Course->value:
                $request->validate([
                    'course_file' => 'required|mimes:pdf',
                ]);

                $file_uri   = Storage::disk('public')->put('courses', $request->course_file);
                $file_name  = $request->file('course_file')->getClientOriginalName();
                
                $content = Course::create([
                    'file_uri'  => $file_uri,
                    'file_name' => substr($file_name, 0, strlen($file_name) - 4), // -4 pour retirer l'extension '.pdf'
                ]);
                break;
            case RessourceType::Defi->value:
                $request->validate([
                    'defi_description'  => 'required|between:50,1000',
                    'defi_bonus'        => 'nullable',
                ]);
                
                $content = Defi::create([
                    'description'   => $request->defi_description,
                    'bonus'         => $request->defi_bonus,
                ]);
                break;
            case RessourceType::Jeu->value:
                $request->validate([
                    'jeu_description'   => 'required|between:10,1000',
                    'jeu_starting_date' => 'required|date|after:today',
                    'jeu_link'          => 'required|max:2048',
                ]);
                
                $content = Jeu::create([
                    'description'   => $request->jeu_description,
                    'starting_date' => $request->jeu_starting_date,
                    'link'          => $request->jeu_link,
                ]);
                break;
            case RessourceType::Lecture->value:
                $request->validate([
                    'lecture_title'     => 'required|max:255',
                    'lecture_author'    => 'required|max:255',
                    'lecture_year'      => 'required|integer|between:1000,2099',
                    'lecture_summary'   => 'required|between:50,2000',
                    'lecture_analysis'  => 'required|between:50,2000',
                    'lecture_review'    => 'required|between:50,2000',
                ]);
                
                $content = Lecture::create([
                    'title'     => $request->lecture_title,
                    'author'    => $request->lecture_author,
                    'year'      => $request->lecture_year,
                    'summary'   => $request->lecture_summary,
                    'analysis'  => $request->lecture_analysis,
                    'review'    => $request->lecture_review,
                ]);
                break;
            case RessourceType::Photo->value:
                $request->validate([
                    'photo_file'    => 'required|image',
                    'photo_author'  => 'nullable|max:255',
                    'photo_legend'  => 'nullable|max:500',
                ]);
                
                $content = Photo::create([
                    'file_uri'      => Storage::disk('public')->put('photos', $request->photo_file),
                    'photo_author'  => $request->photo_author,
                    'legend'        => $request->photo_legend,
                ]);
                break;
            case RessourceType::Video->value:
                $request->validate([
                    'video_file'    => 'required_without:video_link|prohibited_unless:video_link,null|mimetypes:video/mp4',
                    'video_link'    => 'required_without:video_file|prohibited_unless:video_file,null|max:2048',
                    'video_legend'  => 'nullable|max:500',
                ]);
                
                $content = Video::create([
                    'file_uri'  => !is_null($request->video_file) ? Storage::disk('public')->put('videos', $request->video_file) : null,
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
            'user_id'               => auth()->user()->id,
            'categorie_id'          => $request->categorie_id,
            'status'                => RessourceStatus::Pending->value,
            'restriction'           => RessourceRestriction::Public->value,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        return Redirect::to('ressources/' . $ressource->id)->with('success', 'Ressource modifiée avec succès.');
    }


    public function edit($id) {
        
        $ressource  = Ressource::findOrFail($id);
        $content    = $ressource->ressourceable;
        $categories = Categorie::all();

        if (! Gate::allows('update-ressources', $ressource)) {
            abort(403);
        }

        return view('creation-ressource', [
            'ressource'     => $ressource,
            'content'       => $content,
            'categories'    => $categories,
        ]
    );
    }

    public function update( Request $request, $id ) {

        // On valide les champs de la ressource (après avoir validé ses champs également)
        $request->validate([
            'title'                 => 'required|between:5,255',
            'ressourceable_type'    => 'required',
            'relation'              => 'required',
            'categorie_id'          => 'required',
        ]);

        // On prépare la mise à jour du contenu
        switch ($request->ressourceable_type) {

            case RessourceType::Activite->value:
                $request->validate([
                    'activite_description'      => 'required|min:20',
                    'activite_starting_date'    => 'required|date|after:today',
                    'activite_duration'         => 'required|integer|gt:10|lte:240',
                ]);

                $content = Activite::findOrFail($request->ressourceable_id);

                $content->description   = $request->activite_description;
                $content->starting_date = $request->activite_starting_date;
                $content->duration      = $request->activite_duration;
                break;
            case RessourceType::Article->value:
                $request->validate([
                    'article_source_url' => 'required',
                ]);
                
                $content = Article::findOrFail($request->ressourceable_id);

                $content->source_url = $request->article_source_url;
                break;
            case RessourceType::Atelier->value:
                $request->validate([
                    'atelier_description' => 'required|between:50,2000',
                ]);
                
                $content = Atelier::findOrFail($request->ressourceable_id);

                $content->description = $request->atelier_description;
                break;
            case RessourceType::Course->value:
                $request->validate([
                    'course_file' => 'required|mimes:pdf',
                ]);
                
                $content = Course::findOrFail($request->ressourceable_id);

                // On supprime l'ancien fichier
                Storage::disk('public')->delete($content->file_uri);

                $content->file_uri  = Storage::disk('public')->put('courses', $request->course_file);
                $content->file_name = $request->file('course_file')->getClientOriginalName();
                break;
            case RessourceType::Defi->value:
                $request->validate([
                    'defi_description'  => 'required|between:50,1000',
                    'defi_bonus'        => 'nullable',
                ]);
                
                $content = Defi::findOrFail($request->ressourceable_id);

                $content->description   = $request->defi_description;
                $content->bonus         = $request->defi_bonus;
                break;
            case RessourceType::Jeu->value:
                $request->validate([
                    'jeu_description'   => 'required|between:10,1000',
                    'jeu_starting_date' => 'required|date|after:today',
                    'jeu_link'          => 'required|max:2048',
                ]);
                
                $content = Jeu::findOrFail($request->ressourceable_id);

                $content->description   = $request->jeu_description;
                $content->starting_date = $request->jeu_starting_date;
                $content->link          = $request->jeu_link;
                break;
            case RessourceType::Lecture->value:
                $request->validate([
                    'lecture_title'     => 'required|max:255',
                    'lecture_author'    => 'required|max:255',
                    'lecture_year'      => 'required|integer|between:1000,2099',
                    'lecture_summary'   => 'required|between:50,2000',
                    'lecture_analysis'  => 'required|between:50,2000',
                    'lecture_review'    => 'required|between:50,2000',
                ]);
                
                $content = Lecture::findOrFail($request->ressourceable_id);

                $content->title     = $request->lecture_title;
                $content->author    = $request->lecture_author;
                $content->year      = $request->lecture_year;
                $content->summary   = $request->lecture_summary;
                $content->analysis  = $request->lecture_analysis;
                $content->review    = $request->lecture_review;
                break;
            case RessourceType::Photo->value:
                $request->validate([
                    'photo_file'    => 'required|image',
                    'photo_author'  => 'nullable|max:255',
                    'photo_legend'  => 'nullable|max:500',
                ]);
                
                $content = Photo::findOrFail($request->ressourceable_id);

                // On supprime l'ancien fichier
                Storage::disk('public')->delete($content->file_uri);

                $content->file_uri      = Storage::disk('public')->put('photos', $request->photo_file);
                $content->photo_author  = $request->photo_author;
                $content->legend        = $request->photo_legend;
                break;
            case RessourceType::Video->value:
                $request->validate([
                    'video_file'    => 'required_without:video_link|prohibited_unless:video_link,null|mimetypes:video/mp4',
                    'video_link'    => 'required_without:video_file|prohibited_unless:video_file,null|max:2048',
                    'video_legend'  => 'nullable|max:500',
                ]);
                
                $content = Video::findOrFail($request->ressourceable_id);

                // On supprime l'ancien fichier
                Storage::disk('public')->delete($content->file_uri);

                $content->file_uri  = Storage::disk('public')->put('videos', $request->video_file);
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
        $ressource->status          = RessourceStatus::Pending;
        $ressource->restriction     = RessourceRestriction::Public;
        $ressource->updated_at      = now();

        $ressource->update();

        return Redirect::to('ressources/' . $id)->with('success', 'Ressource modifiée avec succès.');
    }

    /**
     * @since 0.7.0-alpha
     */
    public function delete($id) {

        $ressource = Ressource::findOrFail($id);

        $ressource->commentaires()->delete(); // onDelete('cascade') ne fonctionne pas avec une relation hasMany
        $ressource->ressourceable()->delete();

        $ressource->status = RessourceStatus::Deleted->value;
        $ressource->update();
        $ressource->delete();
        
        return Redirect::to('catalogue')->with('success', 'Ressource supprimée avec succès.');
    }
}
