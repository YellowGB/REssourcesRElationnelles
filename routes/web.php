<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CategorieController;
use App\Models\Ressource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localize', 'localeCookieRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
    Route::get(LaravelLocalization::transRoute('routes.dashboard'), function () {
        $ressources     = Ressource::where('user_id', auth()->user()->id)->get();
        $progressions   = auth()->user()->progressions;
        return view('dashboard', compact('ressources', 'progressions'));
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    //------------ Utilisateurs ------------\\
    Route::group(
        ['middleware' => ['auth', 'admin']],
        function () {
            Route::resource(LaravelLocalization::transRoute('routes.users'), UserController::class); // crée une route pour chaque CRUD + la page dédiée, users.index, users.show, users.create, users.store, users.edit, users.update, users.destroy
            Route::resource(LaravelLocalization::transRoute('routes.roles'), RoleController::class)
                            ->only('index');
        }
    );

    Route::get(LaravelLocalization::transRoute('routes.admin.create'), [UserController::class, 'create_admin'])
                    ->name('admin.create')
                    ->middleware('admin');

    Route::post(LaravelLocalization::transRoute('routes.admin.create'), [UserController::class, 'store_admin'])
                    ->name('admin.store')
                    ->middleware('admin');
    
    Route::get(LaravelLocalization::transRoute('routes.profile'), function () {
        return view('profile', [
            'user' => auth()->user(),
        ]);
    })->middleware(['auth', 'verified'])->name('profile');

    Route::post(LaravelLocalization::transRoute('routes.profile'), [UserController::class, 'update'])
                    ->middleware(['auth', 'verified'])
                    ->name('profile.update');

    Route::post(LaravelLocalization::transRoute('routes.profile.password'), [UserController::class, 'password'])
                    ->middleware(['auth', 'verified'])
                    ->name('profile.password');

    Route::post(LaravelLocalization::transRoute('routes.profile.delete'), [UserController::class, 'destroy'])
                    ->middleware(['auth', 'verified'])
                    ->name('profile.delete');

    //------------------ RGPD ------------------\\
    Route::get(LaravelLocalization::transRoute('routes.privacy'), function() {
        return view('privacy-policy');
    })->name('privacy');

    Route::get(LaravelLocalization::transRoute('routes.legal'), function() {
        return view('legal');
    })->name('legal');

    Route::get(LaravelLocalization::transRoute('routes.map'), function() {
        return view('map');
    })->name('map');

    //------------ Citoyen ---------------\\
    Route::get(LaravelLocalization::transRoute('routes.citizens'), [UserController::class, 'citoyen'])
                    ->name('citizens')
                    ->middleware('admin');

    Route::post(LaravelLocalization::transRoute('routes.citizens.suspend'), [UserController::class, 'suspend'])
                    ->name('citizens.suspend')
                    ->middleware('admin');

    //------------ Categories ------------\\
    Route::get(LaravelLocalization::transRoute('routes.categories.index'), [CategorieController::class, 'index'])
                    ->name('categories.index')
                    ->middleware('admin');
               
    Route::post(LaravelLocalization::transRoute('routes.categories.store'), [CategorieController::class, 'store'])
                    ->name('categories.store')
                    ->middleware('admin');

    //------------ Commentaires ------------\\
    Route::get(LaravelLocalization::transRoute('routes.comment.report'), [CommentaireController::class, 'report'])
                    ->name('comment.report')
                    ->middleware('verified');
    Route::post(LaravelLocalization::transRoute('routes.comment.store'), [CommentaireController::class, 'store'])
                    ->name('comment.store')
                    ->middleware('verified');
    
    //------------ Ressources ------------\\
    Route::get(LaravelLocalization::transRoute('routes.catalogue'), [RessourceController::class, 'index'])
                    ->name('catalogue');

    Route::get(LaravelLocalization::transRoute('routes.catalogue.moderation'), [RessourceController::class, 'moderation'])
                    ->name('catalogue.moderation')
                    ->middleware('moderator');

    Route::get(LaravelLocalization::transRoute('routes.comments.moderation'), [CommentaireController::class, 'moderation'])
                    ->name('comments.moderation')
                    ->middleware('moderator');
    
    Route::get(LaravelLocalization::transRoute('routes.comment.moderation'), [CommentaireController::class, 'show'])
                    ->name('comment.moderation')
                    ->middleware('moderator');

    Route::post(LaravelLocalization::transRoute('routes.comment.ignorer'), [CommentaireController::class, 'ignorer'])
                    ->name('comment.ignorer')
                    ->middleware('moderator');

    Route::post(LaravelLocalization::transRoute('routes.comment.supprimer'), [CommentaireController::class, 'supprimer'])
                    ->name('comment.supprimer')
                    ->middleware('moderator');
    
    Route::get(LaravelLocalization::transRoute('routes.resources.create'), [RessourceController::class, 'create'])
                    ->name('resources.create')
                    ->middleware('verified');
    
    Route::post(LaravelLocalization::transRoute('routes.resources.create'), [RessourceController::class, 'store'])
                    ->name('resources.store')
                    ->middleware('verified');
    
    Route::get(LaravelLocalization::transRoute('routes.courses.show'), [CourseController::class, 'show'])
                    ->name('courses.show');
    
    Route::get(LaravelLocalization::transRoute('routes.resources.edit'), [RessourceController::class, 'edit'])
                    ->name('resources.edit')
                    ->middleware('verified');
    
    Route::post(LaravelLocalization::transRoute('routes.resources.edit'), [RessourceController::class, 'update'])
                    ->name('resources.update')
                    ->middleware('verified');

    Route::post(LaravelLocalization::transRoute('routes.resources.valider'), [RessourceController::class, 'valider'])
                    ->name('resources.valider')
                    ->middleware('moderator');

    Route::post(LaravelLocalization::transRoute('routes.resources.suspendre'), [RessourceController::class, 'suspendre'])
                    ->name('resources.suspendre')
                    ->middleware('moderator');

    Route::get(LaravelLocalization::transRoute('routes.resources.rejeter'), [RessourceController::class, 'rejeter'])
                    ->name('resources.rejeter')
                    ->middleware('moderator');
    
    Route::get(LaravelLocalization::transRoute('routes.resources.destroy'), [RessourceController::class, 'destroy'])
                    ->name('resources.destroy')
                    ->middleware('moderator');
    
    Route::get(LaravelLocalization::transRoute('routes.resources.show'), [RessourceController::class, 'show'])
                    ->name('resources.show');
});

require __DIR__.'/auth.php';

//------------ Système ------------\\
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect']
], function () {
    // some routes with livewire components...
    Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');   
});