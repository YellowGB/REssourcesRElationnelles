<?php

namespace App\Listeners;

use App\Events\CommentDeleted;
use App\Jobs\SendCommentDeleteNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @since 0.7.0-alpha
 */
class TriggerCommentDeleteNotification
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
     * @param  \App\Events\CommentDeleted  $event
     * @return void
     */
    public function handle(CommentDeleted $event)
    {
        SendCommentDeleteNotification::dispatch($event);
    }
}
