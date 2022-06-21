<?php

return [
    "dashboard"                 => "tableau-de-bord",
    "comment.report"            => "commentaire/{id}/signalement",
    "comment.store"             => "ressources/{id}/commentaire",
    "catalogue"                 => "catalogue",
    "password.confirm"          => "confirmation-mot-de-passe",
    "password.request"          => "oubli-mot-de-passe",
    "login"                     => "connexion",
    "register"                  => "inscription",
    "password.reset"            => "reinitialisation-mot-de-passe/{token}",
    "password.update"           => "reinitialisation-mot-de-passe",
    "courses.show"              => "ressources/cours/{id}",
    "resources.create"          => "ressources/creation",
    "resources.show"            => "ressources/{id}",
    "resources.destroy"         => "ressources/{id}/suppression",
    "resources.edit"            => "ressources/{id}/edition",
    "roles"                     => "roles",
    "roles.index"               => "roles",
    "users"                     => "utilisateurs",
    "users.index"               => "utilisateurs",
    "users.create"              => "utilisateurs/creation",
    "users.show"                => "utilisateurs/{user}",
    "users.edit"                => "utilisateurs/{user}/edition",
    "users.update"              => "users/modification",
    "citizens"                  => "citoyens",
    "citizens.suspend"          => "citoyens/suspendre",
    "categories"                => "categories",
    "categories.index"          => 'categories',
    "categories.store"          => 'categories/store',
    "verification.notice"       => "verification-email",
    "verification.verify"       => "verification-email/{id}/{hash}",
    "verification.send"         => "email/verification-notification",
    "resources.valider"         => "ressources/{id}/valider",
    "resources.suspendre"       => "ressources/{id}/suspendre",
    "resources.rejeter"         => "ressources/{id}/rejeter",
    "resources.favorite"        => "ressources/{id}/favoriser",
    "resources.use"             => "ressources/{id}/utiliser",
    "resources.save"            => "ressources/{id}/sauvegarder",
    "catalogue.moderation"      => "catalogue/moderation",
    "comments.moderation"       => "commentaires/moderation",
    "comment.moderation"        => "commentaire/moderation/{id}",
    "comment.ignorer"           => "commentaire/moderation/{id}/ignorer",
    "comment.supprimer"         => "commentaire/moderation/{id}/supprimer",
    "profile"                   => "profil",
    "profile.password"          => "profil/mot-de-passe",
    "profile.delete"            => "profil/suppression",
    "privacy"                   => "politique-de-confidentialite",
    "map"                       => "plan-du-site",
    "legal"                     => "mentions-legales",
    "admin.create"              => "admin/creation",
    "stats"                     => "stats",
    "stats.index"               => "statistiques",
];