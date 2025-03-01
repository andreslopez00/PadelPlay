<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; // ✅ Importar el modelo Product

class ShopController extends Controller
{
    public function index()
    {
        // Obtener todos los productos de la base de datos
        $products = Product::all();
        
        return view('products', compact('products')); // ✅ Pasar los productos a la vista
    }

    public function dashboard()
    {
        if (Auth::user()->is_admin) {
            return view('admin.dashboard'); // ✅ Administradores ven `admin.dashboard`
        }

        // Obtener productos destacados
        $featuredProducts = Product::orderBy('created_at', 'desc')->take(6)->get(); // Obtiene los 6 últimos productos

        return view('dashboard', compact('featuredProducts')); // ✅ Pasar la variable a la vista
    }

    
}
