<?php

namespace App\Jobs;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Bus\Queueable;
use App\Events\CommentIgnored;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\CommentIgnoredNotification;

class SendCommentIgnoreNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public CommentIgnored $comment_ignored)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $creator = User::where('id', $this->comment_ignored->commentaire->user_id)->firstOrFail();

        $creator->notify(new CommentIgnoredNotification($this->comment_ignored->commentaire));
    }
}
