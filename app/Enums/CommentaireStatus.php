<?php

namespace App\Enums;

/**
 * @since 0.6.4-alpha
 * @since 0.7.0-alpha basic enum plutôt qu'un backed enum suite à la suppression de la colonne status dans la table des commentaires
 */
enum CommentaireStatus {
    case Published;//  = 'published';
    case Deleted;//    = 'deleted';
    case Reported;//   = 'reported';
}

?>