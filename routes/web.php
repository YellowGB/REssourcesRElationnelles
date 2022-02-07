<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//------------ Utilisateurs ------------\\
Route::group(
    ['middleware' => ['auth', 'admin']],
    function () {
        Route::resource('users', UserController::class); // crée une route pour chaque CRUD + la page dédiée, users.index, users.show, users.create, users.store, users.edit, users.update, users.destroy
        Route::resource('roles', RoleController::class)
                        ->only('index');
    }
);

//------------ Commentaires ------------\\
Route::get('commentaire/{id}/report', [CommentaireController::class, 'report'])
                ->name('comment.report')
                ->middleware('verified');

//------------ Ressources ------------\\
Route::get('catalogue', [RessourceController::class, 'index'])
                ->name('catalogue');

Route::get('ressources/create', [RessourceController::class, 'create'])
                ->name('ressources.create')
                ->middleware('verified');

Route::post('ressources/create', [RessourceController::class, 'store'])
                ->name('ressources.store')
                ->middleware('verified');

Route::get('ressources/courses/{id}', [CourseController::class, 'show'])
                ->name('courses.show');

Route::get('ressources/{id}/edit', [RessourceController::class, 'edit'])
                ->name('ressources.edit')
                ->middleware('verified');

Route::post('ressources/{id}/edit', [RessourceController::class, 'update'])
                ->name('ressources.update')
                ->middleware('verified');

Route::get('ressources/{id}/delete', [RessourceController::class, 'destroy'])
                ->name('ressources.destroy')
                ->middleware('moderator');

Route::get('ressources/{id}', [RessourceController::class, 'show'])
                ->name('ressources.show');

//------------ Système ------------\\
