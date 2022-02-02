<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Ressource;
use App\Enums\UserPermission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //------------ Utilisateurs ------------\\
        Gate::define('create-users', function (User $user) {
            return User::getPermission($user, UserPermission::CreateUsers->value);
        });

        Gate::define('update-users', function (User $user) {
            return User::getPermission($user, UserPermission::UpdateUsers->value);
        });

        Gate::define('delete-users', function (User $user) {
            return User::getPermission($user, UserPermission::DeleteUsers->value);
        });

        Gate::define('remove-users', function (User $user) {
            return User::getPermission($user, UserPermission::RemoveUsers->value);
        });

        //------------ Catégories ------------\\
        Gate::define('create-categories', function (User $user) {
            return User::getPermission($user, UserPermission::CreateCategories->value);
        });

        Gate::define('update-categories', function (User $user) {
            return User::getPermission($user, UserPermission::UpdateCategories->value);
        });

        Gate::define('delete-categories', function (User $user) {
            return User::getPermission($user, UserPermission::DeleteCategories->value);
        });

        //------------ Ressources ------------\\
        Gate::define('create-ressources', function (User $user) {
            return User::getPermission($user, UserPermission::CreateRessources->value);
        });

        Gate::define('publish-ressources', function (User $user) {
            return User::getPermission($user, UserPermission::PublishRessources->value);
        });

        Gate::define('update-ressources', function (User $user, Ressource $ressource) {
            return User::getPermission($user, UserPermission::UpdateRessourcesOthers->value) || (
                $user->id === $ressource->user_id &&
                User::getPermission($user, UserPermission::UpdateRessourcesSelf->value)
            );
        });

        Gate::define('delete-ressources', function (User $user, Ressource $ressource) {
            return User::getPermission($user, UserPermission::DeleteRessourcesOthers->value) || (
                $user->id === $ressource->user_id &&
                User::getPermission($user, UserPermission::DeleteRessourcesSelf->value)
            );
        });
    }
}
