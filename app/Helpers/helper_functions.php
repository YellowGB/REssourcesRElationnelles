<?php

use App\Models\Ressource;
use Illuminate\Support\Facades\Config;

/**
 * Détermine le type d'une ressource
 * 
 * @return string type
 */
function get_ressource_type(Ressource $ressource) {

    $types = Config::get('constants.models');

    foreach ($types as $type_k => $type_v) {
        if ($ressource->ressourceable_type === $type_k) return $type_v;
    }
}

/**
 * Détermine si une ressource donnée est de type Activite
 * 
 * @return boolean
 */
function is_activite(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Activite');
}

/**
 * Détermine si une ressource donnée est de type Article
 * 
 * @return boolean
 */
function is_article(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Article');
}

/**
 * Détermine si une ressource donnée est de type Atelier
 * 
 * @return boolean
 */
function is_atelier(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Atelier');
}

/**
 * Détermine si une ressource donnée est de type Course
 * 
 * @return boolean
 */
function is_course(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Course');
}

/**
 * Détermine si une ressource donnée est de type Defi
 * 
 * @return boolean
 */
function is_defi(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Defi');
}

/**
 * Détermine si une ressource donnée est de type Jeu
 * 
 * @return boolean
 */
function is_jeu(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Jeu');
}

/**
 * Détermine si une ressource donnée est de type Lecture
 * 
 * @return boolean
 */
function is_lecture(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Lecture');
}

/**
 * Détermine si une ressource donnée est de type Photo
 * 
 * @return boolean
 */
function is_photo(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Photo');
}

/**
 * Détermine si une ressource donnée est de type Video
 * 
 * @return boolean
 */
function is_video(Ressource $ressource) {
    return str_contains($ressource->ressourceable_type, 'App\Models\Video');
}

?>