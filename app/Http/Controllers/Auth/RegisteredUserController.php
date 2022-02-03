<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'firstname'     => ['required', 'string', 'max:255'],
            'nickname'      => ['nullable', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'confirmed', Rules\Password::defaults()],
            'description'   => ['nullable', 'string', 'max:1000'],
            'postcode'      => ['required', 'string', 'size:5'],
        ]);

        $user = User::create([
            'name'           => $request->name,
            'firstname'      => $request->firstname,
            'nickname'       => $request->nickname,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'description'    => $request->description,
            'postcode'       => $request->postcode,
            'status'         => UserStatus::Pending,
            'role_id'        => Role::findId(UserRole::Citizen),
            'last_connexion' => now(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
