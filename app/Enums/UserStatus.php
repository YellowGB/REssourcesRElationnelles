<?php

namespace App\Enums;

enum UserStatus: string {
    case Pending    = 'pending';
    case Verified   = 'verified';
    case Suspended  = 'suspended';
    case Deleted    = 'deleted';
}

?>