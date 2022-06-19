<?php

namespace App\Enums;

/**
 * @since 0.6.4-alpha
 */
enum RessourceStatus: string {
    case Draft      = 'draft';
    case Pending    = 'pending';
    case Published  = 'published';
    case Deleted    = 'deleted';
    case Suspended  = 'suspended';
}

?>