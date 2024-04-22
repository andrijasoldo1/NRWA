<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    // Apply the CORS middleware globally
    Route::middleware([CorsMiddleware::class])->group(function () {
        // Include your route definitions here
        Route::get('/individuals', [IndividualController::class, 'index']);
        Route::post('/individuals', [IndividualController::class, 'store']);
        Route::get('/individuals/{id}', [IndividualController::class, 'show']);
        Route::put('/individuals/{id}', [IndividualController::class, 'update']);
        Route::delete('/individuals/{id}', [IndividualController::class, 'destroy']);

        Route::get('/owns', [OwnsController::class, 'index']);
        Route::post('/owns', [OwnsController::class, 'store']);
        Route::get('/owns/{id}', [OwnsController::class, 'show']);
        Route::put('/owns/{id}', [OwnsController::class, 'update']);
        Route::delete('/owns/{id}', [OwnsController::class, 'destroy']);

        Route::get('/banks', [BankController::class, 'index']);
        Route::post('/banks', [BankController::class, 'store']);
        Route::get('/banks/{id}', [BankController::class, 'show']);
        Route::put('/banks/{id}', [BankController::class, 'update']);
        Route::delete('/banks/{id}', [BankController::class, 'destroy']);
    });
}
}
