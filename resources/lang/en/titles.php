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
    'title'     => 'Title',
    'author'    => 'Author',
    'filename'  => 'Filename',
    'created'   => 'Created the',
    'updated'   => 'Updated the',
    'deleted'   => 'Deleted the',
    'written'   => 'Written the',
    'at'        => 'at',
    'by'        => 'By',
    'readfile'  => 'Read the file',
    'relation' => [
        RessourceRelation::Self->value      => 'Self',
        RessourceRelation::Spouse->value    => 'Partner',
        RessourceRelation::Family->value    => 'Family',
        RessourceRelation::Pro->value       => 'Professional',
        RessourceRelation::Friend->value    => 'Friends and community',
        RessourceRelation::Stranger->value  => 'Strangers',
    ],
    'type' => [
        RessourceType::Activite->value  => 'Activity',
        RessourceType::Article->value   => 'Article',
        RessourceType::Atelier->value   => 'Workshop',
        RessourceType::Course->value    => 'Course',
        RessourceType::Defi->value      => 'Challenge',
        RessourceType::Jeu->value       => 'Game',
        RessourceType::Lecture->value   => 'Synopsis',
        RessourceType::Photo->value     => 'Photo',
        RessourceType::Video->value     => 'Video',
        //--------------------------------------------------------
        RessourceType::Activite->name   => 'Activity',
        RessourceType::Article->name    => 'Article',
        RessourceType::Atelier->name    => 'Workshop',
        RessourceType::Course->name     => 'Course',
        RessourceType::Defi->name       => 'Challenge',
        RessourceType::Jeu->name        => 'Game',
        RessourceType::Lecture->name    => 'Synopsis',
        RessourceType::Photo->name      => 'Photo',
        RessourceType::Video->name      => 'Video',
    ],
    'category' => [
        RessourceCategory::Communication->value => 'Communication',
        RessourceCategory::Culture->value       => 'Culture',
        RessourceCategory::Development->value   => 'Personal development',
        RessourceCategory::Emotion->value       => 'Emotional Intelligence',
        RessourceCategory::Hobby->value         => 'Hobbies',
        RessourceCategory::Pro->value           => 'Business',
        RessourceCategory::Parent->value        => 'Parenthood',
        RessourceCategory::Quality->value       => 'Quality of life',
        RessourceCategory::Sense->value         => 'Search for meaning',
        RessourceCategory::Physical->value      => 'Physical health',
        RessourceCategory::Psychological->value => 'Psychological health',
        RessourceCategory::Spirit->value        => 'Spirituality',
        RessourceCategory::Love->value          => 'Love life',
    ],
    'role' => [
        UserRole::Citizen->value       => 'Citizen',
        UserRole::VerifCitizen->value  => 'Verified Citizen',
        UserRole::Moderator->value     => 'Moderator',
        UserRole::Admin->value         => 'Administrator',
        UserRole::SuperAdmin->value    => 'Super-administrator',
    ],
    'link' => [
        'link'      => 'Link',
        'source'    => 'Source',
        'url'       => 'URL',
        'uri'       => 'URI',
        'current'   => 'Currently uploaded file',
    ],
    'btn' => [
        'create'    => 'Create',
        'edit'      => 'Edit',
        'delete'    => 'Delete',
        'login'     => 'Log in',
        'register'  => "Register",
        'report'    => "Report",
    ],
    'section' => [
        'relation'  => 'Relationship type',
        'category'  => 'Category',
        'role'      => 'Role',
        'type'      => 'Resource type',
        'catalogue' => 'Catalogue',
        'dashboard' => 'Dashboard',
        'login'     => 'Connection',
        'register'  => 'Registration',
        'users'     => 'Users',
        'comments'  => 'Comments',
        'theme'     => 'Theme',
        'lang'      => 'Language',
    ],
    'content' => [
        'description'   => 'Description',
        'bonus'         => 'Bonus',
        'starting'      => 'Starting the',
        'duration'      => 'Duration',
        'title'         => 'Title',
        'publication'   => 'Publishing date',
        'summary'       => 'Summary',
        'analysis'      => 'Analysis',
        'review'        => 'Review',
        'legend'        => 'Caption',
        'none'          => "No content was found for this resource.",
    ],
    'select' => [
        'relation'  => 'Select a type of relationship',
        'category'  => 'Select a category',
        'type'      => 'Select a type of resource',
    ],
    'create' => [
        'ressource' => 'Create a resource',
        'category'  => 'Create a new category',
        'role'      => 'Create a new role',
        'user'      => 'Create a new account',
        'link'      => 'Put here the link to the source',
        //--------------------------------------------------------
        RessourceType::Activite->value  => 'Create an activity',
        RessourceType::Article->value   => 'Create an article',
        RessourceType::Atelier->value   => 'Create a workshop',
        RessourceType::Course->value    => 'Create a course',
        RessourceType::Defi->value      => 'Create a challenge',
        RessourceType::Jeu->value       => 'Create a game',
        RessourceType::Lecture->value   => 'Create a synopsis',
        RessourceType::Photo->value     => 'Create a photo',
        RessourceType::Video->value     => 'Create a video',
    ],
    'edit' => [
        'ressource' => 'Edit the resource',
        'category'  => 'Edit the category',
        'role'      => 'Edit the role',
        'user'      => 'Edit the account',
    ],
    'delete' => [
        'ressource' => 'Delete the resource',
        'category'  => 'Delete the category',
        'role'      => 'Delete the role',
        'user'      => 'Delete the account',
    ],
    'form' => [
        'name'          => 'Name',
        'firstname'     => 'Firstname',
        'nickname'      => 'Nickname',
        'email'         => 'Email',
        'password'      => 'Password',
        'pwdconfirm'    => 'Confirm password',
        'bio'           => 'A few words about yourself',
        'postcode'      => 'Postcode',
        'avatar'        => 'Select an avatar',
    ],
    'auth' => [
        'resend'    => "Resend Verification Email ",
        'login'     => 'Log in',
        'logout'    => 'Log out',
    ],
    'comment' => [
        'reports'   => 'Report|Reports',
        'reported'  => 'Reported',
        'ignore'  => 'Ignore',
        'delete'  => 'Delete',
    ],

];
