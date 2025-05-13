<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\RentalControllerAdmin;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Frontend\CarController as UserCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalControllerFrontend; 


// Public pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/cars', [UserCarController::class, 'index'])->name('cars.index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('cars', AdminCarController::class);
    Route::resource('rentals', RentalControllerAdmin::class);
    Route::resource('customers', AdminCustomerController::class);
});

// Authenticated user routes (Frontend)
Route::middleware('auth')->group(function () {
    Route::get('/rentals/create/{car}', [RentalControllerFrontend::class, 'create'])->name('rentals.create');
    Route::post('/rentals/store', [RentalControllerFrontend::class, 'store'])->name('rentals.store');
    Route::get('/rentals', [RentalControllerFrontend::class, 'index'])->name('rentals.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard (requires auth + email verification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
