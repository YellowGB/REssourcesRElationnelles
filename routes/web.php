<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RessourceController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//------------ Utilisateurs ------------\\
Route::get('roles', [RoleController::class, 'index'])
                ->name('roles')
                ->middleware('verified');

Route::get('users', [UserController::class, 'index'])
                ->name('users')
                ->middleware('verified');

Route::get('users/create', [UserController::class, 'create'])
                ->name('users.create')
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

Route::get('ressources/{id}', [RessourceController::class, 'show'])
                ->name('ressources.show');
