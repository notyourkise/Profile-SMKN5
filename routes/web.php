<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('jurusan')->group(function () {
    Route::get('/', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/{id}', [JurusanController::class, 'show'])->name('jurusan.show');
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('berita.show');
});
