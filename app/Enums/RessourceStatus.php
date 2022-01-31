<?php

namespace App\Enums;

enum RessourceStatus: string {
    case Draft      = 'draft';
    case Pending    = 'pending';
    case Published  = 'published';
    case Deleted    = 'deleted';
}

?>