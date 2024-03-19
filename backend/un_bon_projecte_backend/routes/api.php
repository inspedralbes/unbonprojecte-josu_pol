<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Retrieve all cars
Route::get('/cars', [CarController::class, 'index']);

// Retrieve a single car by ID
Route::get('/cars/{id}', [CarController::class, 'show']);

// Create a new car
Route::post('/cars', [CarController::class, 'store']);

// Update a car by ID
Route::put('/cars/{id}', [CarController::class, 'update']);

// Delete a car by ID
Route::delete('/cars/{id}', [CarController::class, 'destroy']);

// Insert many cars at once
Route::post('/cars/insertMany', [CarController::class, 'insertManyCars']);

// Insert a single car
Route::post('/cars/insertSingle', [CarController::class, 'insertSingleCar']);
