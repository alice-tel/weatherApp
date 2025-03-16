<?php

use App\Http\Controllers\WeatherDataController;
use App\Http\Controllers\WeatherViewController;
use Illuminate\Support\Facades\Route;

Route::get('/weather', [WeatherViewController::class, 'index'])->name('weather.index');
Route::get('weather/dashboard', [WeatherViewController::class, 'dashboard'])->name('weather.dashboard');
Route::get('weather/station/{name}', [WeatherViewController::class, 'stations'])->name('weather.station');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
