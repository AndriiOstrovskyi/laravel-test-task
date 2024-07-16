<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('auth')
->controller(AuthController::class)
->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login')->name('login');
    Route::middleware('auth:api')->post('/logout', 'logout');
});




