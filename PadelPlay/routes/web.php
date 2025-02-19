<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Rutas de autenticación
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
});
