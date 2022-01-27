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

    'site'      => 'Ressources Relationnelles',
    'title'     => 'Titre',
    'author'    => '{1} Auteur|{2} Auteure', // 1 et 2 basés sur le chiffre correspondant au sexe de la sécurité sociale
    'filename'  => 'Nom du fichier',
    'created'   => '{1} Créé le|{2} Créée le|{3} Créés le|{4} Créées le', // 1 et 2 basés sur le chiffre correspondant au sexe de la sécurité sociale, 3 et 4 l'équivalent au pluriel
    'updated'   => '{1} Modifié le|{2} Modifiée le|{3} Modifiés le|{4} Modifiées le',
    'at'        => 'à',
    'by'        => 'Par',
    'readfile'  => 'Lire le fichier',
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
    'role' => [
        'citoyen'               => 'Citoyen',
        'moderateur'            => 'Modérateur',
        'administrateur'        => 'Administrateur',
        'superadministrateur'   => 'Super-administrateur',
    ],
    'link' => [
        'link'      => 'Lien',
        'source'    => 'Source',
        'url'       => 'URL',
        'uri'       => 'Emplacement du fichier',
        'current'   => 'Fichier actuellement enregistré',
    ],
    'btn' => [
        'create'    => 'Créer',
        'edit'      => 'Éditer',
        'login'     => 'Se connecter',
        'register'  => "S'inscrire",
    ],
    'section' => [
        'relation'  => 'Type de relation',
        'category'  => 'Catégorie',
        'role'      => 'Rôle',
        'type'      => 'Type de ressource',
        'catalogue' => 'Catalogue',
        'dashboard' => 'Tableau de bord',
        'login'     => 'Connexion',
        'register'  => 'Inscription',
        'users'     => 'Les utilisateurs',
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
        'user'      => 'Créer un nouveau compte',
    ],
    'edit' => [
        'ressource' => 'Éditer la ressource',
        'category'  => 'Éditer la catégorie',
        'role'      => 'Éditer le role',
    ],
    'form' => [
        'name'          => 'Nom',
        'firstname'     => 'Prénom',
        'nickname'      => 'Pseudonyme',
        'email'         => 'Email',
        'password'      => 'Mot de passe',
        'pwdconfirm'    => 'Confirmez le mot de passe',
        'bio'           => 'Quelques mots à propos de vous',
        'postcode'      => 'Code postal',
        'avatar'        => 'Sélectionnez un avatar',
    ],

];
