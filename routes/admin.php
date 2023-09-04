<?php

use App\Http\Controllers\Api\v1\Admins\PostController;
use App\Http\Controllers\Api\v1\Admins\Sessions\ProfileController;
use App\Http\Controllers\Api\v1\Admins\Sessions\SessionController;
use App\Http\Controllers\Api\v1\Admins\TagController;
use App\Http\Controllers\Api\v1\Admins\BookmarkController;
use App\Http\Controllers\Api\v1\Admins\CommentController;
use App\Http\Controllers\Api\v1\Admins\ReplyCommentController;
use Illuminate\Support\Facades\Route;

Route::name('sessions.')->prefix('sessions')->group(function () {
    Route::post('register', [SessionController::class, 'register'])->name('register');
    Route::post('login', [SessionController::class, 'login'])->name('login');
    Route::post('send-verification-code', [SessionController::class, 'sendVerificationCode'])->name('send_verification_code');
    Route::post('activate-account', [SessionController::class, 'ActivationAccount'])->name('activate_account');
    Route::post('rest-password', [SessionController::class, 'sendRestPassword'])->name('send_rest_password');
    Route::patch('rest-password', [SessionController::class, 'restPassword'])->name('rest_password');

    Route::middleware('auth:admin-api')->group(function () {
        Route::get('logout', [SessionController::class, 'logout'])->name('logout');

        Route::get('profile', [ProfileController::class, 'show'])->name('show.profile');
        Route::patch('profile', [ProfileController::class, 'update'])->name('update.profile');
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

    Route::name('posts.')->prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/own', [PostController::class, 'indexOwn'])->name('index_own');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/{id}', [PostController::class, 'show'])->name('show');
        Route::patch('/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('/', [PostController::class, 'destroy'])->name('destroy');

        Route::name('comments.')->prefix('{id}/comments')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('index');
            Route::post('/', [CommentController::class, 'store'])->name('store');
            Route::get('/{commentId}', [CommentController::class, 'show'])->name('show');
            Route::patch('/{commentId}', [CommentController::class, 'update'])->name('update');
            Route::delete('/', [CommentController::class, 'destroy'])->name('destroy');

            Route::name('reply_comments.')->prefix('{commentId}/reply-comments')->group(function () {
                Route::post('/', [ReplyCommentController::class, 'store'])->name('store');
                Route::patch('/{replyCommentId}', [ReplyCommentController::class, 'update'])->name('update');
                Route::delete('/', [ReplyCommentController::class, 'destroy'])->name('destroy');
            });
        });
    });

    Route::name('bookmarks.')->prefix('bookmarks')->group(function () {
        Route::get('/', [BookmarkController::class, 'index'])->name('index');
        Route::post('/', [BookmarkController::class, 'store'])->name('store');
        Route::get('/{id}', [BookmarkController::class, 'show'])->name('show');
        Route::delete('/', [BookmarkController::class, 'destroy'])->name('destroy');
    });
});
