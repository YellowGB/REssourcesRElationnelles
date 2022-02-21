<?php

return [
    "dashboard"                 => "dashboard",
    "comment.report"            => "comment/{id}/report",
    "catalogue"                 => "catalogue",
    "password.confirm"          => "confirm-password",
    "password.request"          => "forgot-password",
    "login"                     => "login",
    "register"                  => "register",
    "password.reset"            => "reset-password/{token}",
    "password.update"           => "reset-password",
    "courses.show"              => "resources/courses/{id}",
    "resources.create"          => "resources/create",
    "resources.show"            => "resources/{id}",
    "resources.destroy"         => "resources/{id}/delete",
    "resources.edit"            => "resources/{id}/edit",
    "roles"                     => "roles",
    "roles.index"               => "roles",
    "users"                     => "users",
    "users.index"               => "utilisateurs",
    "users.create"              => "users/creation",
    "users.show"                => "users/{user}",
    "users.edit"                => "users/{user}/edition",
    "verification.notice"       => "verify-email",
    "verification.verify"       => "verify-email/{id}/{hash}",
    "verification.send"         => "email/verification-notification",
    "resources.valider"         => "ressources/{id}/validate",
    "resources.suspendre"       => "ressources/{id}/suspend",
    "resources.rejeter"         => "ressources/{id}/reject",
    "catalogue.moderation"      => "catalogue/moderation",
    "comments.moderation"       => "comments/moderation",
    "comment.moderation"        => "comment/moderation/{id}",
    "comment.ignorer"           => "comment/moderation/{id}/ignore",
    "comment.supprimer"         => "comment/moderation/{id}/delete",
    "admin.create"              => "admin/create",
];