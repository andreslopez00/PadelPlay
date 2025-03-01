<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage; // Asegúrate de importar Storage

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Court;

class CourtController extends Controller
{
    public function index()
    {
        $courts = Court::all();
        return view('admin.courts.index', compact('courts')); // Vista de gestión de pistas (ADMIN)
    }

    public function showPublicCourts()
{
    $courts = Court::all(); // Obtener todas las pistas
    return view('services', compact('courts')); // Pasarlas a la vista 'services.blade.php'
}


    public function create()
    {
        return view('admin.courts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Court::create($request->all());

        return redirect()->route('admin.courts.index')->with('success', 'Pista creada con éxito.');
    }

    public function edit(Court $court)
    {
        return view('admin.courts.edit', compact('court'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric|min:0|max:9999999999.99',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Buscar la pista por su ID
    $court = Court::findOrFail($id);

    // Actualizar los datos de la pista
    $court->name = $request->name;
    $court->location = $request->location;
    $court->price = $request->price;

    // Manejo de imagen si se actualiza
    if ($request->hasFile('image')) {
        // Eliminar imagen antigua si existe
        if ($court->image) {
            Storage::delete('public/' . $court->image);
        }

        // Guardar nueva imagen
        $imagePath = $request->file('image')->store('courts', 'public');
        $court->image = $imagePath;
    }

    $court->save(); // Guardar los cambios

    return redirect()->route('admin.courts.index')->with('success', 'Pista actualizada correctamente.');
}


    public function destroy(Court $court)
    {
        $court->delete();
        return redirect()->route('admin.courts.index')->with('success', 'Pista eliminada con éxito.');
    }
}
