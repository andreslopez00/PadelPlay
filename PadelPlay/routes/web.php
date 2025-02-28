<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
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
    
    // Verificación de email
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard')->with('status', 'Email verificado correctamente!');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Link de verificación enviado!');
    })->middleware(['throttle:6,1'])->name('verification.send');
});

// 🟠 RUTAS PÚBLICAS (No requieren autenticación)
Route::get('/index', function () { return view('index'); })->name('index');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/products', function () { return view('products'); })->name('products');
Route::get('/services', function () { return view('services'); })->name('services');
Route::get('/testimonials', function () { return view('testimonials'); })->name('testimonials');
Route::get('/contact', function () { return view('contact'); })->name('contact');

// Ruta raíz
Route::redirect('/', '/login');