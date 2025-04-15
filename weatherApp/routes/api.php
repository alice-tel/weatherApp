<?php

use App\Http\Controllers\IwaApiController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\WeatherDataController;
use App\Http\Controllers\WeatherViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/weather-data', [WeatherDataController::class, 'store']);

Route::get('/dashboard/latest', [WeatherViewController::class, 'latestData']);
Route::post('/IWA/contracten/login', [JWTAuthController::class, 'login'])->middleware('auth:api');
Route::post('/IWA/contracten/logout', [JWTAuthController::class, 'logout'])->middleware('auth:api');

