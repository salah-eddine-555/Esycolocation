<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DepenseController;
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

    Route::get('/admin', function(){ return view('admin');});

    // routes pour colocations
    Route::get('/colocation', [ColocationController::class, 'index']);
    Route::get('/colocation/{colocation}', [ColocationController::class, 'show'])->name('colocation.show');
    Route::post('/colocation', [ColocationController::class, 'store'])->name('colocation.store');
    Route::get('/colocation/{colocation}/edit', [ColocationController::class, 'edit'])->name('colocation.edit');
    Route::patch('/colocation/{colocation}', [ColocationController::class, 'update'])->name('colocation.update');


    //route categories
    Route::post('/categorie/{colocation}', [CategorieController::class, 'store'])->name('categorie.store');
    Route::get('/categorie/{categorie}', [CategorieController::class, 'edit'])->name('categorie.edit');
    Route::patch('/categorie/{categorie}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::delete('/categorie/{categorie}', [CategorieController::class, 'destroy'])->name('categorie.destroy');

    //routes pour depenses
    Route::post('/depense/{colocation}', [DepenseController::class, 'store'])->name('depense.store');
  
});

require __DIR__.'/auth.php';
