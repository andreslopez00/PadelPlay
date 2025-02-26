@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h2 class="fw-bold">Nuestros Productos</h2>
        <p class="lead">Explora nuestra selección de palas, pelotas y accesorios de alta calidad para mejorar tu juego.</p>
    </div>

    <div class="row mt-5">
        <!-- Producto 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="text-center">
                    <img src="{{ asset('img/adidas-metalbone-33.jpg') }}" class="card-img-top product-img" alt="Pala Pro">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Pala Pro</h5>
                    <p class="card-text flex-grow-1">La pala definitiva para jugadores avanzados. Potencia y control en un solo producto.</p>
                    <p class="fw-bold">$199.99</p>
                    <button class="btn btn-primary mt-auto add-to-cart"
                            data-id="1" data-name="Pala Pro" data-price="199.99">Añadir al Carrito</button>
                </div>
            </div>
        </div>

        <!-- Producto 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="text-center">
                    <img src="{{ asset('img/bolas.jpg') }}" class="card-img-top product-img" alt="Pelotas de Pádel">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Pelotas de Pádel (Pack 3)</h5>
                    <p class="card-text flex-grow-1">Pelotas oficiales con durabilidad y rebote óptimo para entrenamientos y torneos.</p>
                    <p class="fw-bold">$9.99</p>
                    <button class="btn btn-primary mt-auto add-to-cart"
                            data-id="2" data-name="Pelotas de Pádel" data-price="9.99">Añadir al Carrito</button>
                </div>
            </div>
        </div>

        <!-- Producto 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="text-center">
                    <img src="{{ asset('img/zapas.jpg') }}" class="card-img-top product-img" alt="Zapatillas Pádel">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Zapatillas Pádel</h5>
                    <p class="card-text flex-grow-1">Zapatillas diseñadas para un agarre óptimo en pista y máxima comodidad.</p>
                    <p class="fw-bold">$79.99</p>
                    <button class="btn btn-primary mt-auto add-to-cart"
                            data-id="3" data-name="Zapatillas Pádel" data-price="79.99">Añadir al Carrito</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
