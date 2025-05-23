<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;

require __DIR__.'/auth.php';

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::patch('/change-password', [ChangePasswordController::class, 'update']);

    Route::apiResource('users', UserController::class);
});

Route::apiResource('vehicles', App\Http\Controllers\VehicleController::class);

Route::apiResource('customers', App\Http\Controllers\CustomerController::class);

Route::apiResource('gps-devices', App\Http\Controllers\GpsDeviceController::class);

Route::apiResource('service-histories', App\Http\Controllers\ServiceHistoryController::class);
