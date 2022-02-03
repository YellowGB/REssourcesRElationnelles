<?php

namespace App\Enums;

/**
 * @since 0.6.4-alpha
 */
enum CommentaireStatus: string {
    case Published  = 'published';
    case Deleted    = 'deleted';
    case Reported   = 'reported';
}

?>