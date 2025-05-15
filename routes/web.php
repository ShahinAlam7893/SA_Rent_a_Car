<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\RentalControllerAdmin;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CarController as UserCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalControllerFrontend;

// ----------------------------
// Public Routes
// ----------------------------
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/cars', [UserCarController::class, 'index'])->name('cars.index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// ----------------------------
// Authenticated User Routes
// ----------------------------
Route::middleware('auth')->group(function () {
    // Rental - Frontend
    Route::get('/rentals/create/{car}', [RentalControllerFrontend::class, 'create'])->name('rentals.create');
    Route::post('/rentals/store', [RentalControllerFrontend::class, 'store'])->name('rentals.store');
    Route::get('/rentals', [RentalControllerFrontend::class, 'index'])->name('rentals.index');

    // User Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------------------
// Admin Routes
// ----------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('cars', AdminCarController::class);
    Route::resource('rentals', RentalControllerAdmin::class);
    Route::resource('customers', AdminCustomerController::class);

    // Admin Dashboard (requires verified email too)
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->middleware('verified')->name('admin.dashboard');
});

// ----------------------------
// Auth Routes (Login, Register, etc.)
// ----------------------------
require __DIR__.'/auth.php';
