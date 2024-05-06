<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\OwnsController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\MemberController;

Route::apiResource('members', MemberController::class);


// Register the CORS middleware
Route::middleware('App\Http\Middleware\CorsMiddleware')->group(function () {
    
    // Rute za Individuals
    Route::get('/individuals', [IndividualController::class, 'index']);
    Route::post('/individuals', [IndividualController::class, 'store']);
    Route::get('/individuals/{id}', [IndividualController::class, 'show']);
    Route::put('/individuals/{id}', [IndividualController::class, 'update']);
    Route::delete('/individuals/{id}', [IndividualController::class, 'destroy']);

    // Rute za Owns
    Route::get('/owns', [OwnsController::class, 'index']);
    Route::post('/owns', [OwnsController::class, 'store']);
    Route::get('/owns/{id}', [OwnsController::class, 'show']);
    Route::put('/owns/{id}', [OwnsController::class, 'update']);
    Route::delete('/owns/{id}', [OwnsController::class, 'destroy']);

    // Rute za Bank
    Route::get('/banks', [BankController::class, 'index']);
    Route::post('/banks', [BankController::class, 'store']);
    Route::get('/banks/{id}', [BankController::class, 'show']);
    Route::put('/banks/{id}', [BankController::class, 'update']);
    Route::delete('/banks/{id}', [BankController::class, 'destroy']);


    

});

