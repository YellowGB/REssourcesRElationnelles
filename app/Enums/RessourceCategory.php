<?php

namespace App\Enums;

/**
 * @since 0.6.6-alpha
 */
enum RessourceCategory: string {
    case Communication  = 'communication';
    case Culture        = 'culture';
    case Development    = 'development';
    case Emotion        = 'emotion';
    case Hobby          = 'hobby';
    case Pro            = 'pro';
    case Parent         = 'parent';
    case Quality        = 'quality';
    case Sense          = 'sense';
    case Physical       = 'physical';
    case Psychological  = 'psychological';
    case Spirit         = 'spirit';
    case Love           = 'love';
}

?>