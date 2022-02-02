<?php

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

?>