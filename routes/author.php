<?php

use App\Http\Controllers\Api\v1\Authors\Sessions\SessionController;
use Illuminate\Support\Facades\Route;

Route::name('sessions.')->prefix('sessions')->group(function () {
    Route::post('/register', [SessionController::class, 'register'])->name('register');
    Route::post('/login', [SessionController::class, 'login'])->name('login');
    Route::post('/send-verification-code', [SessionController::class, 'sendVerificationCode'])->name('send_verification_code');
    Route::post('/activate-account', [SessionController::class, 'activateAccount'])->name('activate_account');
    Route::post('rest-password',[SessionController::class,'sendRestPassword'])->name('send_rest_password');
    Route::patch('rest-password',[SessionController::class,'restPassword'])->name('rest_password');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
    });
});
