<?php

namespace App\Enums;

/**
 * @since 0.6.4-alpha
 */
enum UserStatus: string {
    case Pending    = 'pending';
    case Verified   = 'verified';
    case Suspended  = 'suspended';
    case Deleted    = 'deleted';
}

?>