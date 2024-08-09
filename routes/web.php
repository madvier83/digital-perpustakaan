<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuSayaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('buku', BukuController::class);
    Route::resource('buku-saya', BukuSayaController::class);

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('kategori', KategoriController::class);
    });
});

require __DIR__ . '/auth.php';
