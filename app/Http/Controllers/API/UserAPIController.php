<?php

namespace App\Http\Controllers\API;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

/**
 * @since 0.8.1-alpha
 */
class UserAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return $users->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'          => ['required', 'string', 'max:255'],
        //     'firstname'     => ['required', 'string', 'max:255'],
        //     'nickname'      => ['nullable', 'string', 'max:255'],
        //     'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password'      => ['required', 'confirmed', Rules\Password::defaults()],
        //     'description'   => ['nullable', 'string', 'max:1000'],
        //     'postcode'      => ['required', 'string', 'size:5'],
        // ]);

        $user = User::create([
            'name'           => $request->name,
            'firstname'      => $request->firstname,
            'nickname'       => $request->nickname,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'description'    => $request->description,
            'postcode'       => $request->postcode,
            'role_id'        => Role::findId(UserRole::Citizen),
            'last_connexion' => now(),
        ]);

        event(new Registered($user));
        
        return response()->json([
            "success" => "OK",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);
        $role = $user->role;

        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
