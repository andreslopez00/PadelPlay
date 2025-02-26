<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/success', [PaymentController::class, 'success'])->name('success');


// 🟢 RUTAS DE AUTENTICACIÓN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔵 REDIRECCIÓN INICIAL A LOGIN
Route::get('/', function () {
    return redirect()->route('login');
});

// 🟠 RUTAS PÚBLICAS (No requieren autenticación)
Route::get('/index', function () { return view('index'); })->name('index');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/products', function () { return view('products'); })->name('products');
Route::get('/services', function () { return view('services'); })->name('services');
Route::get('/testimonials', function () { return view('testimonials'); })->name('testimonials');
Route::get('/contact', function () { return view('contact'); })->name('contact');

// 🛒 RUTA DEL CARRITO
Route::get('/cart', function () { return view('cart'); })->name('cart');

// 💳 RUTA DE LA PASARELA DE PAGO (Checkout)
Route::get('/checkout', function () { return view('checkout'); })->name('checkout');

// 🔴 RUTAS PROTEGIDAS (Requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
});
