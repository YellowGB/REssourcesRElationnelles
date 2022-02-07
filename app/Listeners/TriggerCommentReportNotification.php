<?php

namespace App\Listeners;

use App\Events\CommentReported;
use App\Jobs\SendCommentReportNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @since 0.7.0-alpha
 */
class TriggerCommentReportNotification
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
     * @param  \App\Events\CommentReported  $event
     * @return void
     */
    public function handle(CommentReported $event)
    {
        SendCommentReportNotification::dispatch($event);
    }
}
