<?php

use App\Enums\UserPermission;

return [
    'permissions' => [
        UserPermission::CreateRessources->value         => 0,
        UserPermission::PublishRessources->value        => 0,
        UserPermission::UpdateRessourcesSelf->value     => 0,
        UserPermission::UpdateRessourcesOthers->value   => 0,
        UserPermission::DeleteRessourcesSelf->value     => 0,
        UserPermission::DeleteRessourcesOthers->value   => 0,
        UserPermission::CreateUsers->value              => 0,
        UserPermission::UpdateUsers->value              => 0,
        UserPermission::DeleteUsers->value              => 0,
        UserPermission::RemoveUsers->value              => 0, // Supprimer définitivement
        UserPermission::CreateCategories->value         => 0,
        UserPermission::UpdateCategories->value         => 0,
        UserPermission::DeleteCategories->value         => 0,
        UserPermission::AccessAdmin->value              => 0,
    ],
];