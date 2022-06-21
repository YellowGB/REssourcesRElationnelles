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
    'simplehr'  => 'the',
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
        //--------------------------------------------------------
        strtolower(RessourceType::Activite->name)   => 'Activity',
        strtolower(RessourceType::Article->name)    => 'Article',
        strtolower(RessourceType::Atelier->name)    => 'Workshop',
        strtolower(RessourceType::Course->name)     => 'Course',
        strtolower(RessourceType::Defi->name)       => 'Challenge',
        strtolower(RessourceType::Jeu->name)        => 'Game',
        strtolower(RessourceType::Lecture->name)    => 'Synopsis',
        strtolower(RessourceType::Photo->name)      => 'Photo',
        strtolower(RessourceType::Video->name)      => 'Video',
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
        'follow'    => "Article available at the following URL:",
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
        'report'    => 'Report',
        'cancel'    => 'Cancel',
        'save'      => 'Save',
        'ok'        => 'Ok',
        'confirm'   => 'Confirm',
        'forgot'    => 'Forgotten password',
        'share'     => 'Share',
        'bookmark'  => 'Bookmark',
        'bookmarked'=> 'Bookmarked',
        'favorite'  => 'Add to favorites',
        'favorited' => 'Favorited',
        'exploit'   => 'Mark as used',
        'exploited' => 'Used',
        'access'    => 'Access',
    ],
    'section' => [
        'relation'  => 'Relationship type',
        'category'  => 'Category|Categories',
        'role'      => 'Role|Roles',
        'type'      => 'Resource type',
        'catalogue' => 'Catalogue',
        'dashboard' => 'Dashboard',
        'login'     => 'Connection',
        'register'  => 'Registration',
        'users'     => 'Users',
        'citizens'  => 'Citizens',
        'comments'  => 'Comments',
        'theme'     => 'Theme',
        'lang'      => 'Language',
        'resource'  => 'Resource',
        'profile'   => 'Profile',
        'privacy'   => 'Privacy Policy',
        'map'       => 'Site map',
        'progress'  => 'Progress board',
        'stats'     => 'Statistics',
        'legal'     => 'Legal notices',
        'mypublish' => 'My published resources',
        'mypending' => 'My resources pending validation',
        'myfav'     => 'My favorite resources',
        'myexploit' => 'My used resources',
        'mybookmark'=> 'My bookmarked resources',
    ],
    'content' => [
        'content'       => 'Content',
        'description'   => 'Description',
        'bonus'         => 'Bonus',
        'starting'      => 'Starting the',
        'simplestart'   => 'The',
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
        'admin'     => 'Create an administrator account',
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
        'pwdcurrent'    => 'Current Password',
        'pwdnew'        => 'New Password',
        'pwdconfirm'    => 'Confirm password',
        'bio'           => 'A few words about yourself',
        'postcode'      => 'Postcode',
        'avatar'        => 'Select an avatar',
        'role'          => 'Administrator type',
    ],
    'auth' => [
        'resend'    => "Resend Verification Email ",
        'login'     => 'Log in',
        'logout'    => 'Log out',
        'state'     => "You're connected as",
    ],
    'comment' => [
        'reports'   => 'Report|Reports',
        'write'     => 'Write a comment',
        'add'       => 'Add',
        'reported'  => 'Reported',
        'ignore'    => 'Ignore',
        'delete'    => 'Delete',
        'showrep'   => 'View replies',
        'hiderep'   => 'Hide replies',
    ],
    'response' =>  [
        'action'        => 'Reply',
        'add'           => 'Add a reply',
    ],
    'moderation' => [
        'ressource'     => 'Moderate resources',
        'pending'      => 'Resources pending moderation',
        'validate'      => 'Validate the resource',
        'dismiss'       => 'Reject the resource',
        'suspend'       => 'Suspend the resource',
        'comment'       => 'Moderate the comment|Moderate comments',
        'desc'          => [
            'ressource'     => "Access the pending resources' list, update them, validate their publication or deny it.",
            'comment'       => 'Access the list of comments reported by citizens above a threshold, see them in context; delete or ignore them.',
        ],
    ],
    'administration' => [
        'citizens'  => 'Manage citizen accounts',
        'category'  => 'Manage resources categories',
        'roles'     => 'Manage user roles',
        'desc'      => [
            'citizens'  => 'Access the list of citizens accounts, suspend or unsuspend them.',
            'category'  => 'List resources categories and add new ones.',
            'admin'     => 'Create moderator and administrator accounts.',
            'roles'     => 'List existing roles, update their rights and create new roles.',
            'stats'     => 'View various statistics about the application and its users and export them.',
        ],
    ],
    'profile' => [
        'title' => [
            'information'   => 'Profile Information',
            'password'      => 'Update Password',
            'delete'        => 'Delete Account',
            'preferences'   => 'Account preferences',
        ],
        'desc' => [
            'information'   => "Update your account's profile information and email address.",
            'password'      => 'Ensure your account is using a long, random password to stay secure.',
            'delete'        => 'Delete your account and all related data',
            'deldetail'     => 'Once your account is deleted, you can ask an administrator to restore it. If you wish to permanently delete your account, contact an administrator.',
            'delconfirm'    => 'Are you sure you want to delete your account? Once your account is deleted, you can ask an administrator to restore it. If you wish to permanently delete your account, contact an administrator.',
            'preferences'   => 'Update your account preferences.',
        ],
    ],
    'user' => [
        'suspend'   => 'Suspend',
        'unsuspend' => 'Unsuspend',
    ],
    'chat' => [
        'messages'  => ":group's messages",
        'send'      => 'Send',
        'groups'    => 'Chat groups',
    ],
    'chart' => [
        'name'    => [
            'terms' => ':number most search terms',
        ],
        'dataset' => [
            'terms' => 'Searches count',
        ],
    ],

];
