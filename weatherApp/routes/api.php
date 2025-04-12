<?php

use App\Http\Controllers\IwaApiController;
use App\Http\Controllers\WeatherDataController;
use App\Http\Controllers\WeatherViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/weather-data', [WeatherDataController::class, 'store']);

Route::get('/dashboard/latest', [WeatherViewController::class, 'latestData']);

Route::get('/IwaApi', [IwaApiController::class, 'IwaData']);
