<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
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
     * Display verified citoyen
     * 
     * @return \Illuminate\Http\Response
     */
    public function citoyen()
    {
        $citoyens = User::all()->where('role_id', 2);

        return view('citoyens', compact('citoyens'));
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
    public function update(Request $request)
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

        $user = auth()->user();

        $user->name         = $request->name ?? $user->name;
        $user->firstname    = $request->firstname ?? $user->firstname;
        // Il est possible d'avoir un pseudo et de l'effacer, c'est pourquoi nous devons seulement vérifier si $request->nickname existe mais pas s'il est vide
        $user->nickname     = isset($request->nickname) ? $user->nickname : $request->nickname;
        $user->email        = $request->email ?? $user->email;
        // Il est possible de vider la description, c'est pourquoi nous devons seulement vérifier si $request->description existe mais pas s'il est vide
        $user->description  = isset($request->description) ? $user->description : $request->description;
        $user->postcode     = $request->postcode ?? $user->postcode;

        $user->update(); // ne pas tenir compte de l'erreur vscode, il n'arrive pas à faire correctement le lien en raison de trop nombreux rebons, mais l'update fonctionne bien

        return Redirect::to(route('profile'))->with('success', 'Profil modifié avec succès.');
    }

    /**
     * Met à jour le mot de passe de l'utilisateur
     * 
     * @since 0.9.1-alpha
     */
    public function password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->update(); // ne pas tenir compte de l'erreur vscode, il n'arrive pas à faire correctement le lien en raison de trop nombreux rebons, mais l'update fonctionne bien

        return Redirect::to(route('profile'))->with('success', 'Mot de passe modifié avec succès.');
    }

    /**
     * Suspend / retire la suspension sur un compte
     * 
     * @since 0.9.2-alpha
     */
    public function suspend(Request $request)
    {
        $citoyen = User::find($request->id);
        $citoyen->suspended_at = is_null($citoyen->suspended_at) ? now() : null;
        $citoyen->update();

        return Redirect::to(route('citizens'))->with('success', 'Statut citoyen modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    /**
     * Supprimer le compte actuellement authentifié
     * 
     * @since 0.9.4-alpha
     */
    public function selfDestroy()
    {
        auth()->logout();

        $user = auth()->user();
        $user->delete(); // ne pas tenir compte de l'erreur vscode, il n'arrive pas à faire correctement le lien en raison de trop nombreux rebons, mais l'update fonctionne bien

        // return Redirect::to(route('dashboard'))->with('success', 'Utilisateur supprimé avec succès.');
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
            'password'          => Hash::make($request->password),
            'postcode'          => $request->postcode,
            'role_id'           => $request->role,
            'last_connexion'    => now(),
        ]);

        $user->email_verified_at = now();
        $user->update();

        // event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
