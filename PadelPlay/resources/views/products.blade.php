@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h2 class="fw-bold">Nuestros Productos</h2>
        <p class="lead">Explora nuestra selección de palas, pelotas y accesorios de alta calidad para mejorar tu juego.</p>
    </div>

    <div class="row mt-5">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="text-center">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-img" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="card-img-top product-img" alt="Imagen por defecto">
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text flex-grow-1">{{ $product->description }}</p>
                        <p class="fw-bold">${{ number_format($product->price, 2) }}</p>
                        <button class="btn btn-primary mt-auto add-to-cart"
                                data-id="{{ $product->id }}" 
                                data-name="{{ $product->name }}" 
                                data-price="{{ $product->price }}">
                            Añadir al Carrito
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($products->isEmpty())
        <div class="text-center mt-5">
            <h4>No hay productos disponibles.</h4>
        </div>
    @endif
</div>
@endsection
