<?php

namespace App\Enums;

/**
 * @since 0.6.7-alpha
 */
enum RessourceType: string {
    case Activite   = 'App\Models\Activite';
    case Article    = 'App\Models\Article';
    case Atelier    = 'App\Models\Atelier';
    case Course     = 'App\Models\Course';
    case Defi       = 'App\Models\Defi';
    case Jeu        = 'App\Models\Jeu';
    case Lecture    = 'App\Models\Lecture';
    case Photo      = 'App\Models\Photo';
    case Video      = 'App\Models\Video';
}

?>