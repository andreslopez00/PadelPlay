@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h2 class="fw-bold">Nuestros Productos</h2>
    <p class="lead">Explora nuestra selección de palas, pelotas y accesorios para mejorar tu juego.</p>
    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Ver Tienda</a>
</div>
@endsection
