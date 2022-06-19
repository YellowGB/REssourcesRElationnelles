<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localize', 'localeCookieRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
    
    Route::group(['middleware' => 'guest'], function () {
        
        Route::get(LaravelLocalization::transRoute('routes.register'), [RegisteredUserController::class, 'create'])
                ->name('register');

        Route::post(LaravelLocalization::transRoute('routes.register'), [RegisteredUserController::class, 'store']);
    
        Route::get(LaravelLocalization::transRoute('routes.login'), [AuthenticatedSessionController::class, 'create'])
                ->name('login');
                
        Route::post(LaravelLocalization::transRoute('routes.login'), [AuthenticatedSessionController::class, 'store']);
    
        Route::get(LaravelLocalization::transRoute('routes.password.request'), [PasswordResetLinkController::class, 'create'])
                ->name('password.request');
    
        Route::post(LaravelLocalization::transRoute('routes.password.request'), [PasswordResetLinkController::class, 'store'])
                ->name('password.email');
                
        Route::get(LaravelLocalization::transRoute('routes.password.reset'), [NewPasswordController::class, 'create'])
                ->name('password.reset');

        Route::post(LaravelLocalization::transRoute('routes.password.update'), [NewPasswordController::class, 'store'])
                ->name('password.update');
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get(LaravelLocalization::transRoute('routes.verification.notice'), [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

        Route::post(LaravelLocalization::transRoute('routes.verification.send'), [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');
    
        Route::get(LaravelLocalization::transRoute('routes.verification.verify'), [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');
                
        Route::get(LaravelLocalization::transRoute('routes.password.confirm'), [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

        Route::post(LaravelLocalization::transRoute('routes.password.confirm'), [ConfirmablePasswordController::class, 'store']);
    });
});
    
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
