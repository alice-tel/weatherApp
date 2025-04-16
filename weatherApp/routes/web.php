<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractTestController;
use App\Http\Controllers\FaultyStationsController;
use App\Http\Controllers\WeatherDataController;
use App\Http\Controllers\WeatherViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\SubscriptionViewController;

Route::get('/weather', [WeatherViewController::class, 'index'])->name('weather.index')->middleware('auth');
Route::get('weather/dashboard', [WeatherViewController::class, 'dashboard'])->name('weather.dashboard')->middleware('auth');
Route::get('weather/station/{name}', [WeatherViewController::class, 'station'])->name('weather.station')->middleware('auth');
Route::get('/', [WeatherViewController::class, 'home'])->name('home');

Route::get('/subscriptions', [SubscriptionViewController::class, 'index'])->name('subscriptions.index')->middleware('auth');
Route::get('subscriptions/{id}', [SubscriptionViewController::class, 'contract'])->name('subscriptions.contract')->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register')->middleware('checkrole:6');
Route::post('/register', [AuthController::class, 'Register'])->name('register')->middleware('checkrole:6');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');  // post because this is a button that only sends the logout request

//adminPages
Route::get('/administrator/superAdminPage', [AdminController::class, 'adminIndex'])->name('administrator.superAdminPage')->middleware('checkrole:6');
Route::get('administrator/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('administrator.deleteUser')->middleware('checkrole:6');
//Route::get('/administrator/EditRoles', [AdminController::class, 'showRoles'])->name('administrator.showRoles')->middleware('checkrole:6');
Route::get('/administrator/EditUsers', [AdminController::class, 'showUsers'])->name('administrator.showUsers')->middleware('checkrole:6');
//Route::post('/administrator/EditRoles', [AdminController::class, 'updateRoles'])->name('administrator.UpdateRoles')->middleware('checkrole:6');
Route::post('/administrator/EditUsers', [AdminController::class, 'updateUsers'])->name('administrator.UpdateUsers')->middleware('checkrole:6');

Route::get('/contract', [ContractTestController::class, 'show'])->name('contract')->middleware('auth');
Route::get('/faulty-stations', [FaultyStationsController::class, 'show'])->name('faulty.stations');

Route::get('/about', function () {
    return view('about');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
