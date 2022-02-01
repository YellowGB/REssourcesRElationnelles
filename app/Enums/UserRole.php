<?php

namespace App\Enums;

/**
 * @since 0.6.4-alpha
 */
enum UserRole: string {
    case Citizen        = 'citoyen';
    case VerifCitizen   = 'citoyenverifie';
    case Moderator      = 'moderateur';
    case Admin          = 'administrateur';
    case SuperAdmin     = 'superadministrateur';
}

?>