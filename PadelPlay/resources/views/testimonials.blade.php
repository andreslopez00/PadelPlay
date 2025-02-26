@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h2 class="fw-bold">Lo Que Dicen Nuestros Clientes</h2>
    <div class="row">
        <!-- Testimonio 1 -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <img src="{{ asset('img/juanperez.jpg') }}" class="testimonial-img mb-3" alt="Juan Pérez">
                <p class="fst-italic">“PadelPlay me ha ayudado a mejorar mi juego con su increíble selección de productos.”</p>
                <p class="fw-bold">- Juan Pérez</p>
            </div>
        </div>

        <!-- Testimonio 2 -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <img src="{{ asset('img/analopez.jpg') }}" class="testimonial-img mb-3" alt="Ana López">
                <p class="fst-italic">“Reservar pistas nunca ha sido tan fácil y rápido. ¡Excelente servicio!”</p>
                <p class="fw-bold">- Ana López</p>
            </div>
        </div>

        <!-- Testimonio 3 -->
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <img src="{{ asset('img/carlos.jpg') }}" class="testimonial-img mb-3" alt="Carlos Ramírez">
                <p class="fst-italic">“Los productos son de alta calidad y el envío es rápido. Muy recomendado.”</p>
                <p class="fw-bold">- Carlos Ramírez</p>
            </div>
        </div>
    </div>
</div>
@endsection
