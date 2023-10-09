<?php

use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearAvatarController;
use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearPosterController;
use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearPostImagesController;
use App\Http\Controllers\Api\v1\Supports\Reports\ReportAuthorController;
use App\Http\Controllers\Api\v1\Supports\Reports\ReportCommentController;
use App\Http\Controllers\Api\v1\Supports\Reports\ReportUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::name('clear_images.')->prefix('clear-images')->group(function () {
        Route::delete('avatar', ClearAvatarController::class)->name('avatar');
        Route::delete('post/{id}/poster', ClearPosterController::class)->name('poster');
        Route::delete('post/{id}/post-images', ClearPostImagesController::class)->name('post_images');
    });

    Route::name('reports.')->group(function () {
        Route::post('users/{id}/report', ReportUserController::class)->name('user');
        Route::post('authors/{id}/report', ReportAuthorController::class)->name('author');
        Route::post('comments/{id}/report', ReportCommentController::class)->name('comment');
    });
});
