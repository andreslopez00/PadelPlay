<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Redirigir a la página principal si el usuario ya está autenticado
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return view('home');
    }
}
