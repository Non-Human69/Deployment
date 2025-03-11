<?php

use App\Http\Controllers\BestellingController;
use App\Http\Controllers\BestellingsregelController;
use App\Http\Controllers\ContactperController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeheerController;
use App\Http\Controllers\VerkoopController;
use App\Http\Controllers\VerkoopregelController;
use App\Http\Controllers\VoorraadsController;
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
});
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::resource('beheers', BeheerController::class);
Route::get('/map', [BeheerController::class, 'map'])->name('beheers.map');

Route::resource('products', ProductController::class);

Route::resource('products', ProductController::class);
Route::resource('leverancier', leverancierController::class);
Route::resource('bestelling', BestellingController::class);
Route::resource('product', ProductController::class);
Route::resource('bestellingsregel', BestellingsregelController::class);
Route::resource('verkoop', VerkoopController::class);
Route::resource('verkoopregel', VerkoopregelController::class);
Route::resource('contactper', ContactperController::class);
Route::resource('klant', KlantController::class);


require __DIR__.'/auth.php';
