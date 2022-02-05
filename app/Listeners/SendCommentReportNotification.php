<?php

namespace App\Listeners;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use App\Events\CommentReported;
use App\Notifications\CommentReportedNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @since 0.7.0-alpha
 */
class SendCommentReportNotification
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
        $role = Role::where('name', UserRole::Moderator->value)->firstOrFail();
        $moderators = User::where('role_id', $role->id)->get();

        foreach ($moderators as $moderator) {
            $moderator->notify(new CommentReportedNotification($event->commentaire));
        }
    }
}
