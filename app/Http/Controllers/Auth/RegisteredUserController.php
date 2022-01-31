<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
            'status'         => 'pending',
            'role_id'        => Role::findId('citoyen'),
            'last_connexion' => now(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
