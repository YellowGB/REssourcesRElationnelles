<?php

namespace App\Jobs;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Bus\Queueable;
use App\Events\RessourceRejected;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\RessourceRejectedNotification;

class SendRessourceRejectionNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public RessourceRejected $ressource_rejected)
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
        $creator = User::where('id', $this->ressource_rejected->ressource->user_id)->firstOrfail();

        $creator->notify(new RessourceRejectedNotification($this->ressource_rejected->ressource));
    }
}
