<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));

            // $request->user()->status  = UserStatus::Verified;
            $request->user()->role_id = Role::findId(UserRole::VerifCitizen);
            $request->user()->update();
        }

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
