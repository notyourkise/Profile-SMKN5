<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('jurusan')->group(function () {
    Route::get('/', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/{slug}', [JurusanController::class, 'show'])->name('jurusan.show');
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('berita.show');
});

// Profile Routes
Route::prefix('profil')->group(function () {
    Route::get('/tentang', [ProfileController::class, 'tentang'])->name('profil.tentang');
    Route::get('/unit', [ProfileController::class, 'unit'])->name('profil.unit');
    Route::get('/struktur', [ProfileController::class, 'struktur'])->name('profil.struktur');
});

// Facilities Page
Route::get('/fasilitas', function () {
    return view('fasilitas');
})->name('facilities.index');

// Temporary Agenda Route (Placeholder)
Route::get('/agenda', function () {
    return redirect()->route('home');
})->name('agenda.index');
