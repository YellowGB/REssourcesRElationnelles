<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ProgressionController;
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
        return view('dashboard');
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
    
    //------------ Commentaires ------------\\
    Route::get(LaravelLocalization::transRoute('routes.comment.report'), [CommentaireController::class, 'report'])
                    ->name('comment.report')
                    ->middleware('verified');
    
    //------------ Progression ------------\\
    Route::get(LaravelLocalization::transRoute('routes.progression.favorite'), [ProgressionController::class, 'favorite'])
                    ->name('progression.favorite')
                    ->middleware('verified');

    //------------ Ressources ------------\\
    Route::get(LaravelLocalization::transRoute('routes.catalogue'), [RessourceController::class, 'index'])
                    ->name('catalogue');
    
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