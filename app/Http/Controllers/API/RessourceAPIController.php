<?php

namespace App\Http\Controllers\Api;

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
use App\Enums\RessourceType;
use Illuminate\Http\Request;
use App\Enums\RessourceRestriction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 * @since 0.8.0-alpha
 */
class RessourceAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ressources = Ressource::all();
        
        return $ressources->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // On valide les champs de la ressource
        $request->validate([
            'title'                 => 'required|between:5,255',
            'ressourceable_type'    => 'required',
            'relation'              => 'required',
            'categorie_id'          => 'required',
            'user_id'               => 'required|integer',
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
            'user_id'               => $request->user_id,
            'categorie_id'          => $request->categorie_id,
            'restriction'           => RessourceRestriction::Public->value,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        // On indique que tout s'est bien passé (pas besoin de préciser statut 200, c'est la réponse par défaut)
        return response()->json([
            'success' => __("Resource successfully created"),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $ressource  = Ressource::findOrFail($id);
        $content    = $ressource->ressourceable; // Pas besoin de préciser plus, laravel enverra le content à l'intérieur de ressourceable dans la réponse

        return $ressource; // Laravel se charge de le convertir en json lorsqu'il s'agit d'un seul modèle eloquent et non d'une collection
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
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

        // On indique que tout s'est bien passé (pas besoin de préciser statut 200, c'est la réponse par défaut)
        return response()->json([
            'success' => __("Resource successfully updated"),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $ressource = Ressource::findOrFail($id);

        $ressource->commentaires()->delete(); // onDelete('cascade') ne fonctionne pas avec une relation hasMany
        $ressource->ressourceable()->delete();

        $ressource->update();
        $ressource->delete();

        // On indique que tout s'est bien passé (pas besoin de préciser statut 200, c'est la réponse par défaut)
        return response()->json([
            'success' => __("Resource successfully deleted"),
        ]);
    }
}
