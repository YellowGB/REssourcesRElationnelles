<?php

namespace App\Providers;

use App\Models\Ressource;
use App\Events\CommentReported;
use App\Events\RessourceRejected;
use App\Listeners\AuthorizeLogin;
use App\Events\RessourceSuspended;
use App\Events\RessourceValidated;
use Illuminate\Support\Facades\Event;
use App\Listeners\UpdateLastConnexion;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Observers\RessourceObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Authenticated;
use App\Listeners\TriggerCommentReportNotification;
use App\Listeners\TriggerCommentDeleteNotification;
use App\Listeners\TriggerCommentIgnoreNotification;
use App\Listeners\TriggerRessourceRejectionNotification;
use App\Listeners\TriggerRessourceSuspensionNotification;
use App\Listeners\TriggerRessourceValidationNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CommentReported::class => [
            TriggerCommentReportNotification::class,
        ],
        RessourceValidated::class => [
            TriggerRessourceValidationNotification::class,
        ],
        RessourceRejected::class => [
            TriggerRessourceRejectionNotification::class,
        ],
        RessourceSuspended::class => [
            TriggerRessourceSuspensionNotification::class,
        ],
        CommentIgnored::class => [
            TriggerCommentIgnoreNotification::class,
        ],
        CommentDeleted::class => [
            TriggerCommentDeleteNotification::class,
        ],
        Authenticated::class => [
            UpdateLastConnexion::class,
            AuthorizeLogin::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Ressource::observe(RessourceObserver::class);
        User::observe(UserObserver::class);
    }
}
