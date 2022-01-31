<?php

namespace App\Enums;

enum CommentaireStatus: string {
    case Published  = 'published';
    case Deleted    = 'deleted';
    case Reported   = 'reported';
}

?>