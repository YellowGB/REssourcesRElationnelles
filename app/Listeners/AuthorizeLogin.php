<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuthorizeLogin
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (! is_null($event->user->deleted_at)) {
            Auth::logout();
            abort(403, __('This account has been deleted. If you wish to restore it, please contact an administrator.'));
        }
        elseif (! is_null($event->user->suspended_at)) {
            Auth::logout();
            abort(403, __('This account has been suspended. For more information, please contact an administrator.'));
        }
    }
}
