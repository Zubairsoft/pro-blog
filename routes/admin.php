<?php

use App\Http\Controllers\Api\v1\Admins\Sessions\SessionController;
use Illuminate\Support\Facades\Route;

Route::name('sessions.')->prefix('sessions')->group(function () {
    Route::post('register', [SessionController::class, 'register'])->name('register');
    Route::post('login', [SessionController::class, 'login'])->name('login');
    Route::post('send-verification-code', [SessionController::class, 'sendVerificationCode'])->name('send_verification_code');
    Route::post('activate-account', [SessionController::class, 'ActivationAccount'])->name('activate_account');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('logout', [SessionController::class, 'logout'])->name('logout');
    });
});
