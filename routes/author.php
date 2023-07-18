<?php

use App\Http\Controllers\Api\v1\Authors\PostController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::name('posts.')->prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/{id}', [PostController::class, 'show'])->name('show');
        Route::patch('/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('/', [PostController::class, 'destroy'])->name('destroy');
    });
});
