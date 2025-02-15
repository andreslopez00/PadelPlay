<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Compra;
use App\Models\CompraDetalle;

class PagoController extends Controller
{
    public function procesarPago(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        $user = Auth::user();
        $carrito = $request->input('carrito');

        if (empty($carrito)) {
            return response()->json(['error' => 'El carrito está vacío'], 400);
        }

        try {
            $compra = Compra::create([
                'user_id' => $user->id,
                'total' => array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], $carrito))
            ]);

            foreach ($carrito as $item) {
                CompraDetalle::create([
                    'compra_id' => $compra->id,
                    'producto_id' => $item['id'],
                    'cantidad' => $item['cantidad'],
                    'precio' => $item['precio']
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Compra realizada con éxito',
                'redirect' => route('tienda')
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al procesar la compra: ' . $e->getMessage()], 500);
        }
    }
}

