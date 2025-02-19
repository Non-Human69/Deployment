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

Route::resource('beheers', BeheerController::class);

/*Route::resource('leverancier', leverancierController::class);
Route::recource('bestelling', BestellingController::class);
Route::recource('product', ProductController::class);
Route::recource('bestellingsregel', BestellingsregelController::class);
Route::recource('verkoop', VerkoopController::class);
Route::recource('verkoopregel', VerkoopregelController::class);
Route::recource('contactper', ContactperController::class);
Route::recource('klant', KlantController::class);*/


require __DIR__.'/auth.php';
