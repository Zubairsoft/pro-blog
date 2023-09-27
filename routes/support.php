<?php

use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearAvatarController;
use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearPosterController;
use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearPostImagesController;
use Illuminate\Support\Facades\Route;

Route::name('clear_images.')->middleware('auth:sanctum')->prefix('clear-images')->group(function () {

    Route::delete('avatar', ClearAvatarController::class)->name('avatar');
    Route::delete('post/{id}/poster', ClearPosterController::class)->name('poster');
    Route::delete('post/{id}/post-images', ClearPostImagesController::class)->name('post_images');
});
