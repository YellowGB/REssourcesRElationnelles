<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserPreference;

/**
 * @since 0.7.5-alpha
 */
class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        // A la création d'un nouvel utilisateur, on crée la table de préférence associée (avec les valeurs par défaut)
        UserPreference::create([
            'user_id'   => $user->id,
        ]);
    }
}
