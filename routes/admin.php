<?php

use App\Http\Controllers\Api\v1\Admins\Sessions\SessionController;
use App\Http\Controllers\Api\v1\Admins\TagController;
use Illuminate\Support\Facades\Route;

Route::name('sessions.')->prefix('sessions')->group(function () {
    Route::post('register', [SessionController::class, 'register'])->name('register');
    Route::post('login', [SessionController::class, 'login'])->name('login');
    Route::post('send-verification-code', [SessionController::class, 'sendVerificationCode'])->name('send_verification_code');
    Route::post('activate-account', [SessionController::class, 'ActivationAccount'])->name('activate_account');

    Route::middleware('auth:admin-api')->group(function () {
        Route::get('logout', [SessionController::class, 'logout'])->name('logout');
    });
});

Route::middleware('auth:admin-api')->group(function () {
    Route::name('tags')->prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('/{id}', [TagController::class, 'show'])->name('show');
        Route::patch('/{id}', [TagController::class, 'update'])->name('update');
        Route::delete('/', [TagController::class, 'destroy'])->name('destroy');
    });
});
