<?php

use App\Http\Controllers\Api\v1\Admins\Sessions\SessionController;
use Illuminate\Support\Facades\Route;

Route::name('sessions.')->prefix('sessions')->group(function () {
    Route::get('register', [SessionController::class, 'register'])->name('register');
    Route::get('login', [SessionController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('logout', [SessionController::class, 'login'])->name('logout');
    });
});
