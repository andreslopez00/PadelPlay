<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CourtController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CourtPublicController;



// Rutas protegidas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ShopController::class, 'dashboard'])->name('dashboard');
    Route::get('/cart', function () { return view('cart'); })->name('cart');

     // Rutas de ajustes
     Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/settings/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');

    Route::get('/settings/password', function () {
        return view('auth.passwords.change'); 
    })->name('password.change');
});

// Rutas públicas
Route::get('/index', function () { return view('index'); })->name('index');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/products', [ShopController::class, 'index'])->name('shop.index');
Route::get('/services', [CourtPublicController::class, 'index'])->name('services');
Route::get('/testimonials', function () { return view('testimonials'); })->name('testimonials');
Route::get('/contact', function () { return view('contact'); })->name('contact');


// Rutas de administración (solo accesibles por administradores)
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('products', AdminProductController::class);
        Route::resource('courts', CourtController::class);
    });
// Redirección predeterminada al login
Route::redirect('/', '/login');
