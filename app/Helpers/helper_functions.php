<?php

/**
 * Retourne le nom d'affichage du type de la ressource d'après la classe associée à son content
 * 
 * @param string $ressourceable_type Le chemin du modèle (App\Models\XXX)
 * 
 * @return string $type Le nom du type
 */
function get_ressource_type($ressourceable_type) {

    $type = '';

    switch ($ressourceable_type) {

        case 'App\Models\Activite':
            $type = 'Activité';
            break;
        case 'App\Models\Article':
            $type = 'Article';
            break;
        case 'App\Models\Atelier':
            $type = 'Atelier';
            break;
        case 'App\Models\Course':
            $type = 'Cours';
            break;
        case 'App\Models\Defi':
            $type = 'Défi';
            break;
        case 'App\Models\Jeu':
            $type = 'Jeu';
            break;
        case 'App\Models\Lecture':
            $type = 'Fiche de lecture';
            break;
        case 'App\Models\Photo':
            $type = 'Photo';
            break;
        case 'App\Models\Video':
            $type = 'Vidéo';
            break;
    }

    return $type;
}

?>