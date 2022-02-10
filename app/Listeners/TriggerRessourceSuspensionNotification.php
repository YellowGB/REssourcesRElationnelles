<?php

namespace App\Listeners;

use App\Events\RessourceSuspended;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendRessourceSuspensionNotification;

/**
 * @since 0.7.0-alpha
 */
class TriggerRessourceSuspensionNotification
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
     * @param  \App\Events\RessourceSuspended  $event
     * @return void
     */
    public function handle(RessourceSuspended $event)
    {
        SendRessourceSuspensionNotification::dispatch($event);
    }
}
