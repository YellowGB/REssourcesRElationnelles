<?php

namespace App\Listeners;

use App\Events\RessourceRejected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendRessourceRejectionNotification;

/**
 * @since 0.7.0-alpha
 */
class TriggerRessourceRejectionNotification
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
     * @param  \App\Events\RessourceRejected  $event
     * @return void
     */
    public function handle(RessourceRejected $event)
    {
        SendRessourceRejectionNotification::dispatch($event);
    }
}
