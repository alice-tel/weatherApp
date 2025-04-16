<?php

use App\Http\Controllers\ContractenQueryController;
use App\Http\Controllers\IwaApiController;
use App\Http\Controllers\SubscriptionApiController;
use App\Http\Controllers\WeatherDataController;
use App\Http\Controllers\WeatherViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

//api for acquiring all weather data
Route::post('/weather-data', [WeatherDataController::class, 'store']);

//api for dashboard
Route::get('/dashboard/latest', [WeatherViewController::class, 'latestData']);

//api JWT login and logout
Route::post('/IWA/contracten/login', [JWTAuthController::class, 'login']);
Route::post('/IWA/contracten/logout', [JWTAuthController::class, 'logout'])->middleware('auth:api');

//api subscription routes
Route::get('/IWA/subscriptions', [SubscriptionApiController::class, 'index'])->middleware('auth:api');
Route::get('/IWA/subscriptions/{id}', [SubscriptionApiController::class, 'show'])->middleware('auth:api');

//api query routes
Route::get('/IWA/contracten/{identifier}/{queryID}', [ContractenQueryController::class, 'getQuery'])->name('contracten.queryID')->middleware("auth:api");
Route::get('/IWA/contracten/{identifier}/{queryID}/stations', [ContractenQueryController::class, 'getStationsFromQuery'])->name('contracten.queryID.stations')->middleware("auth:api");
Route::get('/IWA/contracten/{identifier}/station/{name}', [ContractenQueryController::class, 'getStationFromName'])->name('contracten.station.name')->middleware("auth:api");

