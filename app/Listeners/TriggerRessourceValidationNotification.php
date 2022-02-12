<?php

namespace App\Listeners;

use App\Events\RessourceValidated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendRessourceValidationNotification;

/**
 * @since 0.7.0-alpha
 */
class TriggerRessourceValidationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RessourceValidated  $event
     * @return void
     */
    public function handle(RessourceValidated $event)
    {
        SendRessourceValidationNotification::dispatch($event);
    }
}
