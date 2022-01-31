<?php

namespace App\Providers;

use App\Models\Ressource;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('create-ressources', function (User $user) {
            // On récupère la liste des permissions du rôle associé au compte utilisateur connecté
            $permissions = json_decode($user->role->permissions, true);
            // On retourne le booléen correspondant à la compétence recherchée
            return $permissions['can_create_ressources'];
        });

        Gate::define('publish-ressources', function (User $user) {
            $permissions = json_decode($user->role->permissions, true);
            return $permissions['can_publish_ressources'];
        });

        Gate::define('update-ressources', function (User $user, Ressource $ressource) {
            $permissions = json_decode($user->role->permissions, true);
            
            if ($permissions['can_update_ressources_others']) return true;
            return $user->id === $ressource->user_id && $permissions['can_update_ressources_self'];
        });
    }
}
