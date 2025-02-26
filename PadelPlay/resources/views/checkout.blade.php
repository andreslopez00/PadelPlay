@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center">Resumen del Pedido</h2>
    <p class="lead text-center">Revisa tu pedido antes de proceder con el pago.</p>

    <div class="row">
        <!-- Resumen del Carrito -->
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h4 class="fw-bold">Tu Carrito</h4>
                <ul id="checkout-items" class="list-group mb-3">
                    <!-- Items generados dinámicamente -->
                </ul>
                <p class="fw-bold">Total: $<span id="checkout-total">0.00</span></p>
            </div>
        </div>

        <!-- Formulario de Pago -->
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h4 class="fw-bold">Datos de Pago</h4>
                <form id="payment-form">
                    <div class="mb-3">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número de Tarjeta</label>
                        <input type="text" class="form-control" placeholder="**** **** **** ****" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Expiración</label>
                            <input type="text" class="form-control" placeholder="MM/YY" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">CVV</label>
                            <input type="text" class="form-control" placeholder="***" required>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">Pagar Ahora</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
