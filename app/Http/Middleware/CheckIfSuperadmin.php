<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\UserPermission;
use Illuminate\Support\Facades\Auth;

class CheckIfSuperadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) abort(403);

        if (User::getPermission(auth()->user(), UserPermission::RemoveUsers->value)) {
            return $next($request);
        }
        else abort(403);
    }
}
