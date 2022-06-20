<?php

namespace App\Observers;

use App\Enums\RessourceStatus;
use App\Models\Ressource;

class RessourceObserver
{
    /**
     * Handle the Ressource "creating" event.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return void
     */
    public function creating(Ressource $ressource)
    {
        if (is_moderator()) $ressource->status = RessourceStatus::Published;
    }

    /**
     * Handle the Ressource "updating" event.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return void
     */
    public function updating(Ressource $ressource)
    {
        if (! $ressource->isDirty('status') && $ressource->isClean('count')) {
            $ressource->status = is_moderator() ? RessourceStatus::Published : RessourceStatus::Pending;
        }
    }

    /**
     * Handle the Ressource "updated" event.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return void
     */
    public function updated(Ressource $ressource)
    {
        //
    }

    /**
     * Handle the Ressource "deleting" event.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return void
     */
    public function deleting(Ressource $ressource)
    {
        $ressource->status = RessourceStatus::Deleted->value;
        $ressource->saveQuietly(); // saveQuietly pour éviter de trigger l'observer updating et écraser la mise à jour du statut
    }

    /**
     * Handle the Ressource "deleted" event.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return void
     */
    public function deleted(Ressource $ressource)
    {
        //
    }

    /**
     * Handle the Ressource "restored" event.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return void
     */
    public function restored(Ressource $ressource)
    {
        //
    }

    /**
     * Handle the Ressource "force deleted" event.
     *
     * @param  \App\Models\Ressource  $ressource
     * @return void
     */
    public function forceDeleted(Ressource $ressource)
    {
        //
    }
}
