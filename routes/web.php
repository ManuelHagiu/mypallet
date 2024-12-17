<?php

use App\Http\Controllers\Api\TransportUnitController;
use Illuminate\Support\Facades\Route;


// API Routes
Route::prefix('api')->group(function () {
    Route::apiResource('/transport-units', TransportUnitController::class);
});


Route::get('/', function () {
    return view('welcome');
});

// Catch-all route for Vue Router to handle front-end routing
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

