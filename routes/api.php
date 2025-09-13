<?php

use Illuminate\Support\Facades\Route;
// Auto-generated for Buku
use App\Http\Controllers\Api\buku\CreateBukuController;
use App\Http\Controllers\Api\buku\GetAllBukuController;
use App\Http\Controllers\Api\buku\GetOneBukuController;
use App\Http\Controllers\Api\buku\UpdateBukuController;
use App\Http\Controllers\Api\buku\DeleteBukuController;

Route::prefix('buku')->name('buku.')->group(function () {
    Route::get('/', GetAllBukuController::class);
    Route::get('/{id}', GetOneBukuController::class);
    Route::post('/', CreateBukuController::class);
    Route::put('/{id}', UpdateBukuController::class);
    Route::delete('/{id}', DeleteBukuController::class);
});

// Auto-generated for Kategori
use App\Http\Controllers\Api\kategori\CreateKategoriController;
use App\Http\Controllers\Api\kategori\GetAllKategoriController;
use App\Http\Controllers\Api\kategori\GetOneKategoriController;
use App\Http\Controllers\Api\kategori\UpdateKategoriController;
use App\Http\Controllers\Api\kategori\DeleteKategoriController;

Route::prefix('kategori')->name('kategori.')->group(function () {
    Route::get('/', GetAllKategoriController::class);
    Route::get('/{id}', GetOneKategoriController::class);
    Route::post('/', CreateKategoriController::class);
    Route::put('/{id}', UpdateKategoriController::class);
    Route::delete('/{id}', DeleteKategoriController::class);
});

// Auto-generated Relation for Kategori <-> Buku
use App\Http\Controllers\Api\relations\KategoriBukuController;
Route::get('relations/kategori', [KategoriBukuController::class, 'allKategori']);
