<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherDataController;
use App\Http\Controllers\WeatherViewController;
use Illuminate\Support\Facades\Route;

Route::get('/weather', [WeatherViewController::class, 'index'])->name('weather.index');
Route::get('weather/dashboard', [WeatherViewController::class, 'dashboard'])->name('weather.dashboard');
Route::get('weather/station/{name}', [WeatherViewController::class, 'stations'])->name('weather.station');
Route::get('weather/login', [WeatherViewController::class, 'loginPagina'])->name('weather.loginOefenen');
Route::get('/', [WeatherViewController::class, 'home'])->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

//Route::get( 'weather/login')->name('weather.loginOefenen');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
