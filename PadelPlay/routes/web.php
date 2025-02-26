<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Redirección inicial a login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas accesibles sin autenticación
Route::get('/index', function () { return view('index'); })->name('index');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/products', function () { return view('products'); })->name('products');
Route::get('/services', function () { return view('services'); })->name('services');
Route::get('/testimonials', function () { return view('testimonials'); })->name('testimonials');
Route::get('/contact', function () { return view('contact'); })->name('contact');

// Rutas protegidas con autenticación
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
});
