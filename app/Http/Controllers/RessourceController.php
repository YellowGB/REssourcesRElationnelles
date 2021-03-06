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
use App\Models\Ressource;
use App\Models\Commentaire;
use App\Enums\RessourceType;
use Illuminate\Http\Request;
use App\Enums\RessourceRestriction;
use App\Enums\RessourceStatus;
use App\Events\RessourceRejected;
use App\Events\RessourceSuspended;
use App\Events\RessourceValidated;
use App\Models\Progression;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

/**
 * @since 0.7.1-alpha Les statuts sont gérés dans RessourceObserver
 * @since 1.4.0-alpha Progression et Count (statistiques)
 */
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

    public function moderation() {
        
        $ressources = Ressource::where('status', RessourceStatus::Pending->value)->get();

            return view('catalogue-moderation', compact(
                'ressources',
            ));
    }

    public function show($id) {
        $ressource          = Ressource::findOrFail($id);
        $content            = $ressource->ressourceable;
        $commentaires       = Commentaire::where('ressource_id', $id)->get();
        $progression        = Auth::check() ? Progression::where('ressource_id', $id)->where('user_id', auth()->user()->id)->first() : '';
        
        // Il s'agit d'une nouvelle consultation, on incrémente le nombre de visite
        if ($ressource->status === 'published') $ressource->incrementVisitsCount();

        return view('ressource', [
            'ressource'     => $ressource,
            'content'       => $content,
            'commentaires'  => $commentaires,
            'progress'      => [
                'is_favorite'   => $progression->is_favorite ?? 0,
                'is_used'       => $progression->is_used ?? 0,
                'is_saved'      => $progression->is_saved ?? 0,
            ],
        ]);
    }

    public function create() {

        if (! Gate::allows('create-ressources')) {
            abort(403);
        }

        return view('creation-ressource');
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
            'restriction'           => RessourceRestriction::Public->value,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        return Redirect::to('ressources/' . $ressource->id)->with('success', 'Ressource modifiée avec succès.');
    }


    public function edit($id) {
        
        $ressource  = Ressource::findOrFail($id);
        $content    = $ressource->ressourceable;

        if (! Gate::allows('update-ressources', $ressource)) {
            abort(403);
        }

        return view('creation-ressource', [
            'ressource' => $ressource,
            'content'   => $content,
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
        $ressource->restriction     = RessourceRestriction::Public;

        $ressource->update();

        return Redirect::to('ressources/' . $id)->with('success', 'Ressource modifiée avec succès.');
    }

    /**
     * @since 0.7.0-alpha
     */
    public function destroy($id) {

        $ressource = Ressource::findOrFail($id);

        $ressource->commentaires()->delete(); // onDelete('cascade') ne fonctionne pas avec une relation hasMany
        $ressource->ressourceable()->delete();

        $ressource->update();
        $ressource->delete();
        
        
        return Redirect::to('catalogue')->with('success', 'Ressource supprimée avec succès.');
    }

    public function valider($id) {

        $ressource = Ressource::findOrfail($id);

        $ressource->status = RessourceStatus::Published->value;

        $ressource->update();

        event(new RessourceValidated($ressource));

        return Redirect::to('catalogue/moderation')->with('success', 'Ressource validée avec succès.');
    }

    public function rejeter($id) {

        $ressource = Ressource::findOrfail($id);

        $ressource->ressourceable()->delete();

        $ressource->update();
        $ressource->delete();

        event(new RessourceRejected($ressource));

        return Redirect::to('catalogue/moderation')->with('success', 'Ressource rejetée avec succès.');
    }

    public function suspendre($id) {

        $ressource = Ressource::findOrfail($id);

        $ressource->status = RessourceStatus::Suspended->value;

        $ressource->update();

        event(new RessourceSuspended($ressource));

        return Redirect::to('catalogue')->with('success', 'Ressource suspendue avec succès.');
    }    

    /**
     * @since 1.4.0-alpha
     */
    public function favorite($id) {

        $progression = Progression::where(['user_id' => auth()->user()->id, 'ressource_id' => $id])->first();

        if (is_null($progression)) Progression::create([
            'user_id'       => auth()->user()->id,
            'ressource_id'  => $id,
            'is_favorite'   => true,
        ]);
        else {
            $progression->is_favorite = ! $progression->is_favorite;
            $progression->update();
        }

        return Redirect::to('ressources/' . $id)->with('success', 'Progression modifiée avec succès.');
    }

    public function use($id) {

        $progression = Progression::where(['user_id' => auth()->user()->id, 'ressource_id' => $id])->first();

        if (is_null($progression)) Progression::create([
            'user_id'       => auth()->user()->id,
            'ressource_id'  => $id,
            'is_used'       => true,
        ]);
        else {
            $progression->is_used = ! $progression->is_used;
            $progression->update();
        }


        return Redirect::to('ressources/' . $id)->with('success', 'Progression modifiée avec succès.');
    }

    public function save($id) {

        $progression = Progression::where(['user_id' => auth()->user()->id, 'ressource_id' => $id])->first();

        if (is_null($progression)) Progression::create([
            'user_id'       => auth()->user()->id,
            'ressource_id'  => $id,
            'is_saved'      => true,
        ]);
        else {
            $progression->is_saved = ! $progression->is_saved;
            $progression->update();
        }

        return Redirect::to('ressources/' . $id)->with('success', 'Progression modifiée avec succès.');
    }

}
