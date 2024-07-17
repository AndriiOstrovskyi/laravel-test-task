<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherResultController;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('admin')->middleware('auth:api')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::post('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'destroy']);
    });

    Route::prefix('weather/weatherHistory')->group(function () {
        Route::post('/{weatherResult}', [WeatherResultController::class, 'update']);
        Route::delete('/{weatherResult}', [WeatherResultController::class, 'destroy']);
    });
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('weather')->group(function () {
        Route::get('/weatherHistory', [WeatherResultController::class, 'index']);
        Route::get('/weatherHistory/{weatherResult}', [WeatherResultController::class, 'show']);
        Route::post('/saveCurrentWeather', [WeatherResultController::class, 'saveCurrentWeather']);
    });
    
});

