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

// Only one resource route for products
Route::resource('products', ProductController::class);

// Remove manual product.show route, as resource already provides it
// Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::resource('beheers', BeheerController::class);
Route::get('/map', [BeheerController::class, 'map'])->name('beheers.map');
Route::resource('leveranciers', LeverancierController::class);
Route::resource('bestellingen', BestellingController::class);
Route::resource('bestellingsregels', BestellingsregelController::class);
Route::resource('verkopen', VerkoopController::class);
Route::resource('verkoopregels', VerkoopregelController::class);
Route::resource('contactpersonen', ContactperController::class);
Route::resource('klanten', KlantController::class);

// If you need VoorraadsController, add its resource route here
// Route::resource('voorraden', VoorraadsController::class);

require __DIR__.'/auth.php';
