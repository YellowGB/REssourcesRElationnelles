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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;

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
 * @since 1.2.0-alpha choix de formattage supplémentaire
 */
function format_starting_date(Model $content, $qualifying = 'starting') {

    return  __("titles.content.$qualifying").' '.
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

/**
 * Récupère le thème de l'utilisateur
 * 
 * @since 0.7.3-alpha
 */
function get_user_theme() {
    if (! Auth::check()) return; // guard clause, si l'utilisateur n'est pas connecté à un compte, il ne peut pas avoir de thème personnalisé

    if (! session()->has('theme')) {
        session(['theme' => auth()->user()->preference->theme]);
    }
    return session('theme');
}

/**
 * Retourne un extrait d'une chaîne
 * 
 * @since 0.7.6-alpha
 */
function get_excerpt(string $string, int $length = 80) {
    return substr($string, 0, $length) . '...';
}

/**
 * Génère des nombres aléatoires avec une probabilité précisée pour les nombres élevés.
 * Ex: rand_prob(10, 60, 20) = 60% de chance de générer un nombre entre 0 et 10 et 40% de chance entre 11 et 20
 * Ex: rand_prob(300, 20, 500) = 20% de chance de générer un nombre entre 0 et 300 et 80% de chance entre 301 et 500
 * 
 * @param int $max_prob Le maximum le plus probable
 * 
 * @since 1.5.0-alpha
 */
function rand_prob(int $max_prob, int $percentage, int $max_total):int {
    if (rand(0, 100) <= $percentage)    $number = rand(0, $max_prob);
    else                                $number = rand($max_prob + 1, $max_total);
    return $number;
}

?>