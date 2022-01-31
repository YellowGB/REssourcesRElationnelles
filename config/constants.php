<?php

return [
    'models' => [
        'App\Models\Activite'   => 'activite',
        'App\Models\Article'    => 'article',
        'App\Models\Atelier'    => 'atelier',
        'App\Models\Course'     => 'course',
        'App\Models\Defi'       => 'defi',
        'App\Models\Jeu'        => 'jeu',
        'App\Models\Lecture'    => 'lecture',
        'App\Models\Photo'      => 'photo',
        'App\Models\Video'      => 'video',
    ],
    'permissions' => [
        'can_create_ressources' => 0,
        'can_publish_ressources' => 0,
        'can_update_ressources_self' => 0,
        'can_update_ressources_others' => 0,
        'can_delete_ressources_self' => 0,
        'can_delete_ressources_others' => 0,
        'can_create_users' => 0,
        'can_update_users' => 0,
        'can_delete_users' => 0,
        'can_remove_users' => 0, // Supprimer définitivement
        'can_create_categories' => 0,
        'can_update_categories' => 0,
        'can_delete_categories' => 0,
        'can_access_admin' => 0,
    ],
];