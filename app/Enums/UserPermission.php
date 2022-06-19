<?php

namespace App\Enums;

/**
 * @since 0.6.6-alpha
 */
enum UserPermission: string {
    case CreateRessources       = 'can_create_ressources';
    case PublishRessources      = 'can_publish_ressources';
    case UpdateRessourcesSelf   = 'can_update_ressources_self';
    case UpdateRessourcesOthers = 'can_update_ressources_others';
    case DeleteRessourcesSelf   = 'can_delete_ressources_self';
    case DeleteRessourcesOthers = 'can_delete_ressources_others';
    case CreateUsers            = 'can_create_users';
    case UpdateUsers            = 'can_update_users';
    case DeleteUsers            = 'can_delete_users';
    case RemoveUsers            = 'can_remove_users';
    case CreateCategories       = 'can_create_categories';
    case UpdateCategories       = 'can_update_categories';
    case DeleteCategories       = 'can_delete_categories';
    case AccessAdmin            = 'can_access_admin';
}

?>