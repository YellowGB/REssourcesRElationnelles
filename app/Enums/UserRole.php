<?php

namespace App\Enums;

enum UserRole: string {
    case Citizen        = 'citoyen';
    case VerifCitizen   = 'citoyenverifie';
    case Moderator      = 'moderateur';
    case Admin          = 'administrateur';
    case SuperAdmin     = 'superadministrateur';
}

?>