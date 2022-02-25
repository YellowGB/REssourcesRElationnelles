<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

/**
 * @since 0.7.1-alpha ajout de toutes les routes de base
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creation-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = User::findOrFail($id);

        return view('user', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function create_admin() {

        if (! Gate::allows('update-categories')) {
            abort(403);
        }

        return view('creation-admin');
    }

    public function store_admin(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'firstname'     => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'confirmed', Rules\Password::defaults()],
            'postcode'      => ['required', 'string', 'size:5'],
        ]);

        $user = User::create([
            'name'              => $request->name,
            'firstname'         => $request->firstname,
            'email'             => $request->email,
            'email_verified_at' => now(),
            'password'          => Hash::make($request->password),
            'postcode'          => $request->postcode,
            'role_id'           => $request->role,
            'last_connexion'    => now(),
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
