<?php

use App\Models\Ressource;
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
Route::get('catalogue', [RessourceController::class, 'index'])->name('catalogue');
Route::get('ressources/{id}', [RessourceController::class, 'show'])->name('ressources.show');