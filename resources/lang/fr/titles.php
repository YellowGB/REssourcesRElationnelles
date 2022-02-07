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
        RessourceType::Course->name     => 'cours',
        RessourceType::Defi->name       => 'Défi',
        RessourceType::Jeu->name        => 'jeu',
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
        'report'    => "Signaler",
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
        'user'      => 'Éditer le compte',
    ],
    'delete' => [
        'ressource' => 'Supprimer la ressource',
        'category'  => 'Supprimer la catégorie',
        'role'      => 'Supprimer le role',
        'user'      => 'Supprimer le compte',
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
    'auth' => [
        'resend'    => "Renvoyer l'email de vérification", // 'Resend Verification Email'
        'login'     => 'Se connecter',
        'logout'    => 'Se déconnecter',
    ],
    'comment' => [
        'reports' => 'Signalement|Signalements',
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
        'commentaire'   => 'Modérer le commentaire',
    ],
];
