<?php

use Carbon\Carbon;
use App\Models\Jeu;
use App\Models\Defi;
use App\Models\User;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Course;
use App\Models\Groupe;
use App\Models\Article;
use App\Models\Atelier;
use App\Models\Lecture;
use App\Models\Message;
use App\Models\Activite;
use App\Models\Categorie;
use App\Models\Ressource;
use App\Models\Commentaire;
use App\Models\Progression;
use App\Enums\RessourceType;
use App\Enums\LocGenderNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

/**
 * Détermine le type d'une ressource
 * 
 * @return string type
 */
function get_ressource_type(Ressource $ressource) {

    $types = RessourceType::cases();

    foreach ($types as $kType => $vType) {
        if ($ressource->ressourceable_type === $vType) return $kType;
    }
}

/**
 * Détermine si une ressource donnée est de type Activite
 * 
 * @return boolean
 */
function is_activite(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Activite->value);
}

/**
 * Détermine si une ressource donnée est de type Article
 * 
 * @return boolean
 */
function is_article(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Article->value);
}

/**
 * Détermine si une ressource donnée est de type Atelier
 * 
 * @return boolean
 */
function is_atelier(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Atelier->value);
}

/**
 * Détermine si une ressource donnée est de type Course
 * 
 * @return boolean
 */
function is_course(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Course->value);
}

/**
 * Détermine si une ressource donnée est de type Defi
 * 
 * @return boolean
 */
function is_defi(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Defi->value);
}

/**
 * Détermine si une ressource donnée est de type Jeu
 * 
 * @return boolean
 */
function is_jeu(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Jeu->value);
}

/**
 * Détermine si une ressource donnée est de type Lecture
 * 
 * @return boolean
 */
function is_lecture(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Lecture->value);
}

/**
 * Détermine si une ressource donnée est de type Photo
 * 
 * @return boolean
 */
function is_photo(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Photo->value);
}

/**
 * Détermine si une ressource donnée est de type Video
 * 
 * @return boolean
 */
function is_video(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, RessourceType::Video->value);
}

/**
 * Détermine si l'utilisateur connecté est un modérateur ou plus
 * 
 * @since 0.7.0-alpha
 */
function is_moderator() {
    return null !== auth() ? Gate::allows('publish-ressources') : false;
}

/**
 * Détermine si l'utilisateur connecté est un administrateur ou plus
 * 
 * @since 0.7.0-alpha
 */
function is_admin() {
    return null !== auth() ? Gate::allows('access-admin') : false;
}

/**
 * Détermine si l'utilisateur connecté est un super-administrateur
 * 
 * @since 0.7.0-alpha
 */
function is_superadmin() {
    return null !== auth() ? Gate::allows('remove-users') : false;
}

/**
 * Remplit la base de données avec faker pour avoir une base complète rapidement pour effectuer des tests
 * 
 * @since 0.6.6-alpha
 */
function dbfill_faker() {

    User::factory()->count(10)->create();
    for($i=1;$i<=13;$i++) Categorie::factory()->create();
    for($i=1;$i<=9;$i++) Ressource::factory()->create();
    Activite::factory()->count(1)->create();
    Article::factory()->count(1)->create();
    Atelier::factory()->count(1)->create();
    Course::factory()->count(1)->create();
    Defi::factory()->count(1)->create();
    Jeu::factory()->count(1)->create();
    Lecture::factory()->count(1)->create();
    Photo::factory()->count(1)->create();
    Video::factory()->count(1)->create();
    Progression::factory()->count(40)->create();
    Groupe::factory()->count(7)->create();
    Commentaire::factory()->count(50)->create();
    Message::factory()->count(80)->create();

}

/**
 * Affiche un carton d'aperçu d'une ressource
 * 
 * @since 0.6.8-alpha
 */
function display_ressource_preview(Ressource $ressource) {

    echo    '<div style="border: 1px solid black; background-color:lightgrey; cursor: pointer;" onclick="location.href=\'' . route('ressources.show', ['id' => $ressource->id]) . '\'">
                <h2>' . __('titles.type.' . $ressource->ressourceable_type) . '</h2>
                <h3>'. __('titles.relation.' . $ressource->relation) . '</h3>
                <h1>' . $ressource->title . '</h1>
            </div>';

}

/**
 * Affiche un commentaire
 * 
 * @since 0.6.9-alpha
 */
function display_commentaire(Commentaire $commentaire) {

    $commentateur   = get_user_display_name($commentaire->user);
    $horodatage     = format_horodatage($commentaire, 'written');
    
    $display = "<b>$commentateur :</b>";
    $display .= "<p>$commentaire->content</p>";
    $display .= "<i>$horodatage</i>";

    $display .= is_moderator() ? '<br><i>' . trans_choice('titles.comment.reports', $commentaire->reports) . " : $commentaire->reports</i>" : '';

    echo $display;
}

/**
 * Formatte la date de création d'un élément de la base de données
 * en une chaîne de type Créé le xx/xx/xxx à xx:xx
 * 
 * @param Model $element Un modèle eloquent disposant de la colonne 'created_at'
 * @param string $qualifying created, updated, deleted, written
 * @param LocGenderNumber $locGenderNumber Le genre et le nombre du participe passé
 * 
 * @since 0.6.9-alpha
 */
function format_horodatage(Model $element, string $qualifying = 'created', LocGenderNumber $locGenderNumber = LocGenderNumber::MasculineSingular) {

    return  trans_choice("titles.$qualifying", $locGenderNumber->value).' '.
            Carbon::parse($element->created_at)->format('d/m/Y').' '.
            __('titles.at').' '.
            Carbon::parse($element->created_at)->format('H:i');
}
/**
 * Formatte la date de démarrage d'un contenu
 * en une chaîne de type Créé le xx/xx/xxx à xx:xx
 * 
 * @param Model $content Un modèle de contenu de ressource disposant de la colonne 'starting_date'
 * 
 * @since 0.6.9-alpha
 */
function format_starting_date(Model $content) {

    return  __('titles.content.starting').' '.
            Carbon::parse($content->starting_date)->format('d/m/Y').' '.
            __('titles.at').' '.
            Carbon::parse($content->starting_date)->format('H:i');
}

/**
 * Retourne le pseudonyme ou le nom complet de l'utilisateur en fonction de ce qu'il a choisi d'indiquer
 * 
 * @since 0.6.9-alpha
 */
function get_user_display_name(User $user) {
    return $user->nickname ?? $user->firstname.' '.$user->name;
}

?>