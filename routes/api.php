<?php

use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\VerifyJson;
use Illuminate\Support\Facades\Route;

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

Route::middleware(VerifyJson::class)->group(function () {

    Route::prefix('/user')->group(function () {
        Route::post('/login', [UserController::class, 'loginUser']);
        Route::post('/register', [UserController::class, 'registerUser']);
    });

    Route::prefix('/place')->group(function () {
        Route::get('/', [LocationController::class, 'getAll']);
        Route::get('/{id}', [LocationController::class, 'getById']);
        Route::post('/add_location', [LocationController::class, 'addLocation']);
    });

});

