<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', function () { return view('auth.login'); });
Route::get('/index', function () { return view('index'); })->name('index');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/products', function () { return view('products'); })->name('products');
Route::get('/services', function () { return view('services'); })->name('services');
Route::get('/testimonials', function () { return view('testimonials'); })->name('testimonials');
Route::get('/contact', function () { return view('contact'); })->name('contact');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
});
