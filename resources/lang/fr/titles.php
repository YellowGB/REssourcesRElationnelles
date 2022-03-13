<?php

use App\Enums\UserRole;
use App\Enums\RessourceCategory;
use App\Enums\RessourceRelation;
use App\Enums\RessourceType;

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
    'deleted'   => '{1} Supprimé le|{2} Supprimée le|{3} Supprimés le|{4} Supprimées le',
    'written'   => '{1} Écrit le|{2} Écrite le|{3} Écrits le|{4} Écrites le',
    'simplehr'  => 'le', // horodatage simple
    'at'        => 'à',
    'by'        => 'Par',
    'readfile'  => 'Lire le fichier',
    'relation' => [
        RessourceRelation::Self->value      => 'Soi',
        RessourceRelation::Spouse->value    => 'Conjoints',
        RessourceRelation::Family->value    => 'Famille',
        RessourceRelation::Pro->value       => 'Professionnelle',
        RessourceRelation::Friend->value    => 'Amis et communautés',
        RessourceRelation::Stranger->value  => 'Inconnus',
    ],
    'type' => [
        RessourceType::Activite->value  => 'Activité',
        RessourceType::Article->value   => 'Article',
        RessourceType::Atelier->value   => 'Atelier',
        RessourceType::Course->value    => 'Cours',
        RessourceType::Defi->value      => 'Défi',
        RessourceType::Jeu->value       => 'Jeu',
        RessourceType::Lecture->value   => 'Fiche de lecture',
        RessourceType::Photo->value     => 'Photo',
        RessourceType::Video->value     => 'Vidéo',
        //--------------------------------------------------------
        RessourceType::Activite->name   => 'Activité',
        RessourceType::Article->name    => 'Article',
        RessourceType::Atelier->name    => 'Atelier',
        RessourceType::Course->name     => 'Cours',
        RessourceType::Defi->name       => 'Défi',
        RessourceType::Jeu->name        => 'Jeu',
        RessourceType::Lecture->name    => 'Fiche de lecture',
        RessourceType::Photo->name      => 'Photo',
        RessourceType::Video->name      => 'Vidéo',
    ],
    'category' => [
        RessourceCategory::Communication->value => 'Communication',
        RessourceCategory::Culture->value       => 'Culture',
        RessourceCategory::Development->value   => 'Développement personnel',
        RessourceCategory::Emotion->value       => 'Intelligence émotionnelle',
        RessourceCategory::Hobby->value         => 'Loisirs',
        RessourceCategory::Pro->value           => 'Monde professionel',
        RessourceCategory::Parent->value        => 'Parentalité',
        RessourceCategory::Quality->value       => 'Qualité de vie',
        RessourceCategory::Sense->value         => 'Recherche de sens',
        RessourceCategory::Physical->value      => 'Santé physique',
        RessourceCategory::Psychological->value => 'Santé psychique',
        RessourceCategory::Spirit->value        => 'Spiritualité',
        RessourceCategory::Love->value          => 'Vie affective',
    ],
    'role' => [
        UserRole::Citizen->value       => 'Citoyen',
        UserRole::VerifCitizen->value  => 'Citoyen vérifié',
        UserRole::Moderator->value     => 'Modérateur',
        UserRole::Admin->value         => 'Administrateur',
        UserRole::SuperAdmin->value    => 'Super-administrateur',
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
        'delete'    => 'Supprimer',
        'login'     => 'Se connecter',
        'register'  => "S'inscrire",
        'report'    => 'Signaler',
        'cancel'    => 'Annuler',
        'save'      => 'Sauvegarder',
        'ok'        => 'Ok',
        'confirm'   => 'Confirmer',
        'forgot'    => 'Mot de passe oublié',
        'share'     => 'Partager',
        'bookmark'  => 'Mettre de côté',
        'favorite'  => 'Ajouter aux favorites',
        'exploit'   => 'Indiquer comme exploitée',
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
        'comments'  => 'Commentaires',
        'theme'     => 'Thème',
        'lang'      => 'Langue',
        'resource'  => 'Ressource',
        'profile'   => 'Mon profil',
        'privacy'   => 'Politique de confidentialité',
        'map'       => 'Plan du site',
        'progress'  => 'Tableau de progression',
        'stats'     => 'Statistiques',
        'legal'     => 'Mentions légales',
    ],
    'content' => [
        'content'       => 'Contenu',
        'description'   => 'Description',
        'bonus'         => 'Bonus',
        'starting'      => 'Démarre le',
        'simplestart'   => 'Le',
        'duration'      => 'Durée',
        'title'         => 'Titre du livre',
        'publication'   => 'Année de parution',
        'summary'       => 'Résumé',
        'analysis'      => 'Analyse',
        'review'        => 'Avis',
        'legend'        => 'Légende',
        'none'          => "Aucun contenu n'a été trouvé pour cette ressource.",
    ],
    'select' => [
        'relation'  => 'Relation',
        'category'  => 'Catégorie',
        'type'      => 'Sélectionnez le type de ressource',
    ],
    'create' => [
        'ressource' => 'Créer une ressource',
        'category'  => 'Créer une nouvelle catégorie',
        'role'      => 'Créer un nouveau rôle',
        'user'      => 'Créer un nouveau compte',
        'admin'     => 'Créer un compte administrateur',
        'link'      => 'Renseignez ici le lien vers la source',
        //--------------------------------------------------------
        RessourceType::Activite->value  => 'Créer une activité',
        RessourceType::Article->value   => 'Créer un article',
        RessourceType::Atelier->value   => 'Créer un atelier',
        RessourceType::Course->value    => 'Créer un cours',
        RessourceType::Defi->value      => 'Créer un défi',
        RessourceType::Jeu->value       => 'Créer un jeu',
        RessourceType::Lecture->value   => 'Créer une fiche de lecture',
        RessourceType::Photo->value     => 'Créer une photo',
        RessourceType::Video->value     => 'Créer une vidéo',
    ],
    'edit' => [
        'ressource' => 'Éditer la ressource',
        'category'  => 'Éditer la catégorie',
        'role'      => 'Éditer le rôle',
        'user'      => 'Éditer le compte',
    ],
    'delete' => [
        'ressource' => 'Supprimer la ressource',
        'category'  => 'Supprimer la catégorie',
        'role'      => 'Supprimer le rôle',
        'user'      => 'Supprimer le compte',
    ],
    'form' => [
        'name'          => 'Nom',
        'firstname'     => 'Prénom',
        'nickname'      => 'Pseudonyme',
        'email'         => 'Email',
        'password'      => 'Mot de passe',
        'pwdcurrent'    => 'Mot de passe actuel',
        'pwdnew'        => 'Nouveau mot de passe',
        'pwdconfirm'    => 'Confirmez le mot de passe',
        'bio'           => 'Quelques mots à propos de vous',
        'postcode'      => 'Code postal',
        'avatar'        => 'Sélectionnez un avatar',
        'role'          => "Type de compte",
    ],
    'auth' => [
        'resend'    => "Renvoyer l'email de vérification", // 'Resend Verification Email'
        'login'     => 'Se connecter',
        'logout'    => 'Se déconnecter',
    ],
    'comment' => [
        'reports'   => 'Signalement|Signalements',
        'write'     => 'Écrire un commentaire',
        'add'       => 'Ajouter',
        'reported'  => 'Signalés',
        'ignore'    => 'Ignorer',
        'delete'    => 'Supprimer',
        'showrep'   => 'Voir les réponses',
        'hiderep'   => 'Cacher les réponses',
    ],
    'response' =>  [
        'action'        => 'Répondre',
        'add'           => 'Ajouter une réponse',
    ],
    'moderation' => [
        'ressource'     => 'Modérer les ressources',
        'pendings'      => 'Ressources en attente de modération',
        'validate'      => 'Valider la ressource',
        'dismiss'       => 'Rejeter la ressource',
        'suspend'       => 'Suspendre la ressource',
        'commentaire'   => 'Modérer le commentaire',
    ],
    'profile' => [
        'avatar' => 'Avatar',
        'title' => [
            'information'   => 'Informations du compte',
            'password'      => 'Mettre à jour le mot de passe',
            'delete'        => 'Supprimer le compte',
            'preferences'   => 'Préférences du compte',
        ],
        'desc' => [
            'information'   => "Mettre à jour les informations de votre compte et votre adresse email.",
            'password'      => "Assurez-vous que votre compte utilise un mot de passe long et complexe afin d'en garantir sa sécurité.",
            'delete'        => 'Supprimer votre compte ainsi que les informations liées',
            'deldetail'     => 'Une fois votre compte supprimé, vous pouvez demander à un administrateur de le restaurer. Si vous souhaitez supprimer votre compte de manière définitive, contactez un administrateur.',
            'delconfirm'    => 'Êtes-vous sûr de vouloir supprimer votre compte ? Une fois votre compte supprimé, vous pouvez demander à un administrateur de le restaurer. Si vous souhaitez supprimer votre compte de manière définitive, contactez un administrateur.',
            'preferences'   => 'Mettre à jour les préférences de votre compte.',
        ],
    ],
    'user' => [
        'suspend'   => 'Suspendre',
        'unsuspend' => 'Retirer la suspension',
    ],

];
