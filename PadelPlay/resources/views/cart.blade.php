@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center">Tu Carrito de Compras</h2>

    <div class="row">
        <!-- Lista de Productos en el Carrito -->
        <div class="col-md-8">
            <div class="card p-4 shadow-sm">
                <h4 class="fw-bold">Productos en tu Carrito</h4>
                <ul id="cart-items" class="list-group mb-3">
                    <!-- Productos generados dinámicamente con JS -->
                </ul>
                <p class="fw-bold">Total: $<span id="cart-total">0.00</span></p>
            </div>
        </div>

        <!-- Botones de Acción -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm text-center">
                <h4 class="fw-bold">¿Listo para comprar?</h4>
                <a href="{{ url('/checkout') }}" class="btn btn-success w-100 mt-3">Ir a Pagar</a>
                <a href="{{ url('/products') }}" class="btn btn-secondary w-100 mt-2">Seguir Comprando</a>
            </div>
        </div>
    </div>
</div>
@endsection
