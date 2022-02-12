<?php

namespace App\Providers;

use App\Events\CommentReported;
use App\Listeners\AuthorizeLogin;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\TriggerCommentReportNotification;
use App\Listeners\UpdateLastConnexion;
use App\Models\Ressource;
use App\Models\User;
use App\Observers\RessourceObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Authenticated;
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
