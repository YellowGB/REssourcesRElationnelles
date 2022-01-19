<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Titres
    |--------------------------------------------------------------------------
    |
    | Ces lignes recouvrent l'ensemble des titres de section
    | spécifiques au site.
    |
    */

    'title'     => 'Titre',
    'author'    => '{1} Auteur|{2} Auteure', // 1 et 2 basés sur le chiffre correspondant au sexe de la sécurité sociale
    'filename'  => 'Nom du fichier',
    'created'   => '{1} Créé le|{2} Créée le|{3} Créés le|{4} Créées le', // 1 et 2 basés sur le chiffre correspondant au sexe de la sécurité sociale, 3 et 4 l'équivalent au pluriel
    'updated'   => '{1} Modifié le|{2} Modifiée le|{3} Modifiés le|{4} Modifiées le',
    'at'        => 'à',
    'by'        => 'Par',
    'relation' => [
        'self'      => 'Soi',
        'spouse'    => 'Conjoints',
        'family'    => 'Famille',
        'pro'       => 'Professionnelle',
        'friend'    => 'Amis et communautés',
        'stranger'  => 'Inconnus',
    ],
    'type' => [
        'App\Models\Activite'   => 'Activité',
        'App\Models\Article'    => 'Article',
        'App\Models\Atelier'    => 'Atelier',
        'App\Models\Course'     => 'Cours',
        'App\Models\Defi'       => 'Défi',
        'App\Models\Jeu'        => 'Jeu',
        'App\Models\Lecture'    => 'Fiche de lecture',
        'App\Models\Photo'      => 'Photo',
        'App\Models\Video'      => 'Vidéo',
        //--------------------------------------------------------
        'activite'  => 'Activité',
        'article'   => 'Article',
        'atelier'   => 'Atelier',
        'course'    => 'cours',
        'defi'      => 'Défi',
        'jeu'       => 'jeu',
        'lecture'   => 'Fiche de lecture',
        'photo'     => 'Photo',
        'video'     => 'Vidéo',
    ],
    'category' => [
        'communication' => 'Communication',
        'culture'       => 'Culture',
        'development'   => 'Développement personnel',
        'emotion'       => 'Intelligence émotionnelle',
        'hobby'         => 'Loisirs',
        'pro'           => 'Monde professionel',
        'parent'        => 'Parentalité',
        'quality'       => 'Qualité de vie',
        'sense'         => 'Recherche de sens',
        'physical'      => 'Santé physique',
        'psychological' => 'Santé psychique',
        'spirit'        => 'Spiritualité',
        'love'          => 'Vie affective',
    ],
    'link' => [
        'link'      => 'Lien',
        'source'    => 'Source',
        'url'       => 'URL',
        'uri'       => 'Emplacement du fichier',
    ],
    'btn' => [
        'create'    => 'Créer',
        'edit'      => 'Éditer',
    ],
    'section' => [
        'relation'  => 'Type de relation',
        'category'  => 'Catégorie',
        'type'      => 'Type de ressource',
    ],
    'content' => [
        'description'   => 'Description',
        'bonus'         => 'Bonus',
        'starting'      => 'Démarre le',
        'duration'      => 'Durée',
        'title'         => 'Titre',
        'publication'   => 'Année de parution',
        'summary'       => 'Résumé',
        'analysis'      => 'Analyse',
        'review'        => 'Avis',
        'legend'        => 'Légende',
        'none'          => "Aucun contenu n'a été trouvé pour cette ressource.",
    ],
    'select' => [
        'relation'  => 'Sélectionnez un type de relation',
        'category'  => 'Sélectionnez une catégorie',
        'type'      => 'Sélectionnez le type de ressource',
    ],
    'create' => [
        'ressource' => 'Créer une ressource',
        'category'  => 'Créer une nouvelle catégorie',
        'role'      => 'Créer un nouveau role',
    ],
    'edit' => [
        'ressource' => 'Éditer une ressource',
        'category'  => 'Éditer une nouvelle catégorie',
        'role'      => 'Éditer un nouveau role',
    ],

];
