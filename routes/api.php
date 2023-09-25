<?php

use App\Http\Controllers\Api\v1\Users\Sessions\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('users.')->prefix('users')->group(function () {
    Route::name('sessions.')->prefix('sessions')->group(function () {
        Route::post('register', [SessionController::class, 'register'])->name('register');
        Route::post('login', [SessionController::class, 'login'])->name('login');
        Route::post('resend-verification-code', [SessionController::class, 'resendVerificationCode'])->name('send_verification_code');
        Route::post('activate-account', [SessionController::class, 'activateAccount'])->name('activate_account');
        Route::post('forget-password', [SessionController::class, 'forgetPassword'])->name('forget_password');
        Route::patch('reset-password', [SessionController::class, 'resetPassword'])->name('rest_password');

        Route::middleware('auth:author-api')->group(function () {
            Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

        });
    });
});
