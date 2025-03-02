<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $cart = $request->input('cart', []);

        if (empty($cart)) {
            return response()->json(['error' => 'El carrito está vacío'], 400);
        }

        // 1️⃣ Guardar la orden en la base de datos antes de crear la sesión de Stripe
        $order = Order::create([
            'user_id' => Auth::id(),
            'items' => json_encode($cart), // Guardamos los productos como JSON
            'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
            'status' => 'pending', // Estado inicial de la orden
        ]);

        // 2️⃣ Generar la sesión de Stripe
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => array_map(function ($item) {
                return [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => ['name' => $item['name']],
                        'unit_amount' => intval($item['price'] * 100),
                    ],
                    'quantity' => $item['quantity'],
                ];
            }, $cart),
            'mode' => 'payment',
            'success_url' => url('/success?order_id=' . $order->id), // Ahora sí pasamos un order_id válido
            'cancel_url' => url('/cart'),
        ]);

        return response()->json(['id' => $session->id]);
    }

public function success(Request $request)
{
    $orderId = $request->query('order_id');

    if (!$orderId) {
        return redirect('/products')->with('error', 'No se encontró la orden.');
    }

    $order = Order::find($orderId);

    if (!$order) {
        return redirect('/products')->with('error', 'Orden no encontrada.');
    }

    // 3️⃣ Cambiar estado de la orden a "pagado"
    $order->update(['status' => 'paid']);

    // 4️⃣ Decodificar productos desde JSON
    $orderDetails = [
        'user' => Auth::user()->name,
        'email' => Auth::user()->email,
        'items' => json_decode($order->items, true), // Convertir JSON a array
        'total' => $order->total,
    ];

    // 5️⃣ Enviar el email de confirmación de compra
    Mail::to(Auth::user()->email)->send(new OrderConfirmation($orderDetails));

    return view('success')->with('message', 'Pago realizado con éxito. Se ha enviado la confirmación a tu correo.');
}

}
