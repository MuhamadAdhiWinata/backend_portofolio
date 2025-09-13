<?php

use Illuminate\Support\Facades\Route;

// cuki
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
