<?php

use Illuminate\Support\Facades\Route;
// Auto-generated for Blog
use App\Http\Controllers\Api\blog\CreateBlogController;
use App\Http\Controllers\Api\blog\GetAllBlogController;
use App\Http\Controllers\Api\blog\GetOneBlogController;
use App\Http\Controllers\Api\blog\UpdateBlogController;
use App\Http\Controllers\Api\blog\DeleteBlogController;

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', GetAllBlogController::class);
    Route::get('/{id}', GetOneBlogController::class);
    Route::post('/', CreateBlogController::class);
    Route::put('/{id}', UpdateBlogController::class);
    Route::delete('/{id}', DeleteBlogController::class);
});

// Auto-generated for Profile
use App\Http\Controllers\Api\profile\CreateProfileController;
use App\Http\Controllers\Api\profile\GetAllProfileController;
use App\Http\Controllers\Api\profile\GetOneProfileController;
use App\Http\Controllers\Api\profile\UpdateProfileController;
use App\Http\Controllers\Api\profile\DeleteProfileController;

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', GetAllProfileController::class);
    Route::get('/{id}', GetOneProfileController::class);
    Route::post('/', CreateProfileController::class);
    Route::put('/{id}', UpdateProfileController::class);
    Route::delete('/{id}', DeleteProfileController::class);
});
