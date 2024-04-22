<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes for Customer
Route::resource('customers', CustomerController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

// Routes for Rental
Route::resource('rentals', RentalController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

// Routes for Car
Route::resource('cars', CarController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

// Routes for Driver
Route::resource('drivers', DriverController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update');
