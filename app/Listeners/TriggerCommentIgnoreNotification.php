<?php

namespace App\Listeners;

use App\Events\CommentIgnored;
use App\Jobs\SendCommentIgnoreNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @since 0.7.0-alpha
 */
class TriggerCommentIgnoreNotification
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
     * @param  \App\Events\CommentIgnored  $event
     * @return void
     */
    public function handle(CommentIgnored $event)
    {
        SendCommentIgnoreNotification::dispatch($event);
    }
}
