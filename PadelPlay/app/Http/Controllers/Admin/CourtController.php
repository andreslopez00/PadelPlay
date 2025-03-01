<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Court; // ✅ Importar modelo de Pistas

class CourtController extends Controller
{
    public function index()
    {
        $courts = Court::all(); // Obtener todas las pistas
        return view('admin.courts.index', compact('courts'));
    }

    public function create()
    {
        return view('admin.courts.create'); // Mostrar formulario de creación
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Court::create($request->all());

        return redirect()->route('admin.courts.index')->with('success', 'Pista añadida correctamente.');
    }

    public function edit(Court $court)
    {
        return view('admin.courts.edit', compact('court'));
    }

    public function update(Request $request, Court $court)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $court->update($request->all());

        return redirect()->route('admin.courts.index')->with('success', 'Pista actualizada correctamente.');
    }

    public function destroy(Court $court)
    {
        $court->delete();
        return redirect()->route('admin.courts.index')->with('success', 'Pista eliminada correctamente.');
    }
}
