<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MainController::class, 'dashboard'])->name('main.dashboard');
Route::get('/tabel-ph', [MainController::class, 'tabelPH'])->name('main.tabelPH');
Route::get('/tabel-tds', [MainController::class, 'tabelTDS'])->name('main.tabelTDS');
Route::get('/tabel-udara', [MainController::class, 'tabelUdara'])->name('main.tabelUdara');
Route::get('/tabel-arus', [MainController::class, 'tabelArus'])->name('main.tabelArus');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
