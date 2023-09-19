<?php

use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearAvatarController;
use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearPosterController;
use App\Http\Controllers\Api\v1\Supports\ClearImages\ClearPostImagesController;
use Illuminate\Support\Facades\Route;

Route::name('clear_images.')->prefix('clear-images')->group(function () {

    Route::get('avatar', ClearAvatarController::class)->name('avatar');
    Route::get('poster/{id}', ClearPosterController::class)->name('poster');
    Route::get('post-images/{id}', ClearPostImagesController::class)->name('post_images');
});
