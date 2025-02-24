@extends('layouts.app')

@section('title', 'Testimonios')

@section('content')
<h1 class="fw-bold">Testimonios</h1>
<p>Nuestros clientes confían en nosotros.</p>
<div class="row">
    <div class="col-md-4">
        <div class="card p-4 shadow-sm">
            <p>“PadelPlay me ha ayudado a mejorar mi juego con su increíble selección de productos.”</p>
            <p class="fw-bold">- Juan Pérez</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 shadow-sm">
            <p>“Reservar pistas nunca ha sido tan fácil y rápido. ¡Excelente servicio!”</p>
            <p class="fw-bold">- Ana López</p>
        </div>
    </div>
</div>
@endsection
