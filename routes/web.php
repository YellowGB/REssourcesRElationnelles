<?php

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
    return view('home');
});

Route::get('roles', [RoleController::class, 'index'])->name('roles');
Route::get('users', [UserController::class, 'index'])->name('users');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::get('catalogue', [RessourceController::class, 'index'])->name('catalogue');
Route::get('ressources/create', [RessourceController::class, 'create'])->name('ressources.create');
Route::post('ressources/create', [RessourceController::class, 'store'])->name('ressources.store');
Route::get('ressources/{id}/edit', [RessourceController::class, 'edit'])->name('ressources.edit');
Route::post('ressources/{id}/edit', [RessourceController::class, 'change'])->name('ressources.change');
Route::get('ressources/{id}', [RessourceController::class, 'show'])->name('ressources.show');