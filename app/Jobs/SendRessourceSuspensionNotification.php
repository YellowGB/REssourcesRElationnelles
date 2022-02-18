<?php

namespace App\Jobs;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use App\Models\Ressource;
use Illuminate\Bus\Queueable;
use App\Events\RessourceSuspended;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\RessourceSuspendedNotification;

class SendRessourceSuspensionNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public RessourceSuspended $ressource_suspended)
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
        $creator = User::where('id', $this->ressource_suspended->ressource->user_id)->firstOrfail();

        $creator->notify(new RessourceSuspendedNotification($this->ressource_suspended->ressource));
    }
}
