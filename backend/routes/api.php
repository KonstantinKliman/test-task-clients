<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ClientController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/v1'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/user', [UserController::class, 'get']);
        Route::post('/clients', [ClientController::class, 'create']);
        Route::get('/clients', [ClientController::class, 'list']);
        Route::patch('/clients/{clientId}', [ClientController::class, 'updateStatus']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});



