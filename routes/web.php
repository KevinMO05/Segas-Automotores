<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [LoginController::class, 'index']);
Route::post('/login-register', [LoginController::class, 'register']);
Route::post('/login-validation', [LoginController::class, 'login']);