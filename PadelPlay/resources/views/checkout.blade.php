@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h2 class="fw-bold">Resumen del Pedido</h2>
    <p class="lead">Revisa tu pedido antes de pagar.</p>

    <div class="row">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h4 class="fw-bold">Tu Carrito</h4>
                <ul id="checkout-items" class="list-group mb-3">
                    <!-- Productos generados dinámicamente con JS -->
                </ul>
                <p class="fw-bold">Total: $<span id="checkout-total">0.00</span></p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h4 class="fw-bold">Método de Pago</h4>
                <button id="checkout-button" class="btn btn-primary w-100 mt-3">Pagar con Stripe</button>
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    document.getElementById("checkout-button").addEventListener("click", function () {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        fetch("{{ url('/checkout') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ cart })
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert("Error: " + data.error);
            } else {
                localStorage.removeItem("cart"); // 🔥 Vaciamos el carrito antes de redirigir a Stripe
                let stripe = Stripe("{{ env('STRIPE_KEY') }}");
                stripe.redirectToCheckout({ sessionId: data.id });
            }
        })
        .catch(error => console.error("Error al iniciar pago:", error));
    });
</script>

@endsection
