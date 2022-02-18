<?php

namespace App\Jobs;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Bus\Queueable;
use App\Events\RessourceValidated;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\RessourceValidatedNotification;

class SendRessourceValidationNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public RessourceValidated $ressource_validated)
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
        $role = Role::where('name', UserRole::Moderator->value)->firstOrFail();
        $moderators = User::where('role_id', $role->id)->get();

        foreach ($moderators as $moderator) {
            $moderator->notify(new RessourceValidatedNotification($this->ressource_validated->ressource));
        }
    }
}
