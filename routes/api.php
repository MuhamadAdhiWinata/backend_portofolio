<?php

use Illuminate\Support\Facades\Route;
// Auto-generated for Blog
use App\Http\Controllers\Api\blog\CreateBlogController;
use App\Http\Controllers\Api\blog\GetAllBlogController;
use App\Http\Controllers\Api\blog\GetOneBlogController;
use App\Http\Controllers\Api\blog\UpdateBlogController;
use App\Http\Controllers\Api\blog\DeleteBlogController;

// Auto-generated for Profile
use App\Http\Controllers\Api\profile\CreateProfileController;
use App\Http\Controllers\Api\profile\GetAllProfileController;
use App\Http\Controllers\Api\profile\GetOneProfileController;
use App\Http\Controllers\Api\profile\UpdateProfileController;
use App\Http\Controllers\Api\profile\DeleteProfileController;

// Auto-generated for Contact
use App\Http\Controllers\Api\contact\CreateContactController;
use App\Http\Controllers\Api\contact\GetAllContactController;
use App\Http\Controllers\Api\contact\GetOneContactController;
use App\Http\Controllers\Api\contact\UpdateContactController;
use App\Http\Controllers\Api\contact\DeleteContactController;

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', GetAllBlogController::class);
    Route::get('/{id}', GetOneBlogController::class);
    Route::post('/', CreateBlogController::class);
    Route::put('/{id}', UpdateBlogController::class);
    Route::delete('/{id}', DeleteBlogController::class);
});

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', GetAllProfileController::class);
    Route::get('/{id}', GetOneProfileController::class);
    Route::post('/', CreateProfileController::class);
    Route::put('/{id}', UpdateProfileController::class);
    Route::delete('/{id}', DeleteProfileController::class);
});

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', GetAllContactController::class);
    Route::get('/{id}', GetOneContactController::class);
    Route::post('/', CreateContactController::class);
    Route::put('/{id}', UpdateContactController::class);
    Route::delete('/{id}', DeleteContactController::class);
});

// Auto-generated for Testinmonial
use App\Http\Controllers\Api\testinmonial\CreateTestinmonialController;
use App\Http\Controllers\Api\testinmonial\GetAllTestinmonialController;
use App\Http\Controllers\Api\testinmonial\GetOneTestinmonialController;
use App\Http\Controllers\Api\testinmonial\UpdateTestinmonialController;
use App\Http\Controllers\Api\testinmonial\DeleteTestinmonialController;

Route::prefix('testinmonial')->name('testinmonial.')->group(function () {
    Route::get('/', GetAllTestinmonialController::class);
    Route::get('/{id}', GetOneTestinmonialController::class);
    Route::post('/', CreateTestinmonialController::class);
    Route::put('/{id}', UpdateTestinmonialController::class);
    Route::delete('/{id}', DeleteTestinmonialController::class);
});

// Auto-generated for Project
use App\Http\Controllers\Api\project\CreateProjectController;
use App\Http\Controllers\Api\project\GetAllProjectController;
use App\Http\Controllers\Api\project\GetOneProjectController;
use App\Http\Controllers\Api\project\UpdateProjectController;
use App\Http\Controllers\Api\project\DeleteProjectController;

Route::prefix('project')->name('project.')->group(function () {
    Route::get('/', GetAllProjectController::class);
    Route::get('/{id}', GetOneProjectController::class);
    Route::post('/', CreateProjectController::class);
    Route::put('/{id}', UpdateProjectController::class);
    Route::delete('/{id}', DeleteProjectController::class);
});

// Auto-generated for Skill
use App\Http\Controllers\Api\skill\CreateSkillController;
use App\Http\Controllers\Api\skill\GetAllSkillController;
use App\Http\Controllers\Api\skill\GetOneSkillController;
use App\Http\Controllers\Api\skill\UpdateSkillController;
use App\Http\Controllers\Api\skill\DeleteSkillController;

Route::prefix('skill')->name('skill.')->group(function () {
    Route::get('/', GetAllSkillController::class);
    Route::get('/{id}', GetOneSkillController::class);
    Route::post('/', CreateSkillController::class);
    Route::put('/{id}', UpdateSkillController::class);
    Route::delete('/{id}', DeleteSkillController::class);
});
