@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h2 class="fw-bold">Lo Que Dicen Nuestros Clientes</h2>
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
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <p>“Los productos son de alta calidad y el envío es rápido. Muy recomendado.”</p>
                <p class="fw-bold">- Carlos Ramírez</p>
            </div>
        </div>
    </div>
</div>
@endsection
