<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect the root URL to the product index page
Route::redirect('/', '/product');

// Authentication routes
Auth::routes();

// Resourceful route for products
Route::resource('product', ProductController::class);

// Route for layout (not sure what this is for)
Route::get('/layout', [App\Http\Controllers\HomeController::class, 'index'])->name('layout');
