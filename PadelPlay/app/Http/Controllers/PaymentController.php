<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $cart = $request->input('cart');

        if (!$cart || empty($cart)) {
            return response()->json(['error' => 'El carrito está vacío'], 400);
        }

        $lineItems = [];
        $orderDetails = [
            'user' => Auth::user()->name,
            'email' => Auth::user()->email,
            'items' => [],
            'total' => 0
        ];

        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => ['name' => $item['name']],
                    'unit_amount' => intval($item['price'] * 100),
                ],
                'quantity' => $item['quantity'],
            ];

            $orderDetails['items'][] = [
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ];

            $orderDetails['total'] += $item['price'] * $item['quantity'];
        }

        // Guardar los detalles del pedido en sesión
        session(['order_details' => $orderDetails]);

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => url('/success'),
            'cancel_url' => url('/cart'),
        ]);

        return response()->json(['id' => $session->id]);
    }



    public function success()
    {
        if (!session()->has('order_details')) {
            return redirect('/products')->with('error', 'No se encontró la orden.');
        }

        $orderDetails = session('order_details');

        // Enviar el email de confirmación de compra
        Mail::to(Auth::user()->email)->send(new OrderConfirmation($orderDetails));

        // Vaciar la sesión después del envío del correo
        session()->forget('order_details');

        return view('success')->with('message', 'Pago realizado con éxito. Se ha enviado la confirmación a tu correo.');
    }
}
