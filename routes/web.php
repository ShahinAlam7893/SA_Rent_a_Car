<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Frontend\CarController as UserCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\RentalController;



Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/cars', [CarController::class, 'frontend/cars/index'])->name('cars.index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('cars', AdminCarController::class);
    Route::resource('rentals', AdminRentalController::class);
    Route::resource('customers', AdminCustomerController::class);
});


Route::post('/book', [FrontendRentalController::class, 'store'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/rentals/create/{car}', [RentalController::class, 'create'])->name('rentals.create');
    Route::post('/rentals/store', [RentalController::class, 'store'])->name('rentals.store');
    Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
