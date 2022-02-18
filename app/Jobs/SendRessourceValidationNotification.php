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
        $creator = User::where('id', $this->ressource_validated->ressource->user_id)->firstOrfail();

        $creator->notify(new RessourceValidatedNotification($this->ressource_validated->ressource));
    }
}
