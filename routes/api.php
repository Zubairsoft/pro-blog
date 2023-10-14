<?php

use App\Http\Controllers\Api\v1\Users\Posts\CommentController;
use App\Http\Controllers\Api\v1\Users\Posts\LikeController;
use App\Http\Controllers\Api\v1\Users\Posts\PostController;
use App\Http\Controllers\Api\v1\Users\Posts\StoreReportPostController;
use App\Http\Controllers\Api\v1\Users\Sessions\ProfileController;
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

Route::name('users.')->prefix('user')->group(function () {
    Route::name('sessions.')->prefix('sessions')->group(function () {
        Route::post('register', [SessionController::class, 'register'])->name('register');
        Route::post('login', [SessionController::class, 'login'])->name('login');
        Route::post('resend-verification-code', [SessionController::class, 'resendVerificationCode'])->name('send_verification_code');
        Route::post('activate-account', [SessionController::class, 'activateAccount'])->name('activate_account');
        Route::post('forget-password', [SessionController::class, 'forgetPassword'])->name('forget_password');
        Route::patch('reset-password', [SessionController::class, 'resetPassword'])->name('rest_password');

        Route::middleware('auth:api')->group(function () {
            Route::name('profile.')->prefix('profile')->group(function () {
                Route::get('/', [ProfileController::class, 'show'])->name('show');
                Route::patch('/', [ProfileController::class, 'update'])->name('update');
            });
            Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
        });
    });

    Route::name('posts.')->prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index']);
        Route::get('/{id}', [PostController::class, 'show']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/{id}/report', StoreReportPostController::class);

            Route::name('likes.')->group(function () {
                Route::post('/{id}/like', [LikeController::class, 'store']);
                Route::delete('/{id}/like', [LikeController::class, 'destroy']);
            });

            Route::name('comments.')->prefix('{id}/comments')->group(function () {
                Route::post('/', [CommentController::class, 'store']);
                Route::patch('/{commentId}', [CommentController::class, 'update']);
                Route::delete('/', [CommentController::class, 'destroy']);
            });
        });
    });
});
