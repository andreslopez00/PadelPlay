<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class TiendaController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtener todos los productos de la base de datos
        return view('tienda.index', compact('productos'));
    }
}

