<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // routes pour colocations
    Route::POST('/colocation', [ColocationController::class, 'store']);
    Route::patch('/colocation', [ColocationController::class, 'update']);
});

require __DIR__.'/auth.php';
