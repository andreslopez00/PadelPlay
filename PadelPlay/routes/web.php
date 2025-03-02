<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CourtController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CourtPublicController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;

// 🔥 Servicios ahora manejado por `ReservationController`
Route::get('/services', [ReservationController::class, 'index'])->name('services');
Route::post('/reserve', [ReservationController::class, 'reserve'])->name('reserve');

// Rutas protegidas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ShopController::class, 'dashboard'])->name('dashboard');
    Route::get('/cart', function () { return view('cart'); })->name('cart');

    // Rutas de ajustes
    Route::prefix('settings')->group(function () {
        Route::get('/', function () { return view('settings'); })->name('settings');
        Route::get('/profile', function () { return view('profile.edit'); })->name('profile.edit');
        Route::get('/password', function () { return view('auth.passwords.change'); })->name('password.change');
    });

    // Checkout
    Route::get('/checkout', function () { return view('checkout'); })->name('checkout');
    Route::post('/checkout', [PaymentController::class, 'checkout']);
});

// 🔥 Ruta `/success` ahora accesible sin autenticación
Route::get('/success', [PaymentController::class, 'success'])->name('success');

// Rutas públicas
Route::get('/index', function () { return view('index'); })->name('index');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/products', [ShopController::class, 'index'])->name('shop.index');
Route::get('/testimonials', function () { return view('testimonials'); })->name('testimonials');
Route::get('/contact', function () { return view('contact'); })->name('contact');

// Rutas de administración (solo accesibles por administradores)
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('products', AdminProductController::class);
        Route::resource('courts', CourtController::class);
    });

// Redirección predeterminada al login
Route::get('/', function () {
    return redirect()->route('login');
});
