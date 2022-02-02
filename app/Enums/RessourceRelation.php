<?php

namespace App\Enums;

/**
 * @since 0.6.7-alpha
 */
enum RessourceRelation: string {
    case Self       = 'self';
    case Spouse     = 'spouse';
    case Family     = 'family';
    case Pro        = 'pro';
    case Friend     = 'friend';
    case Stranger   = 'stranger';
}

?>