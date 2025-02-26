@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h2 class="fw-bold">Alquiler de Pistas</h2>
        <p class="lead">Reserva fácilmente tu pista de pádel en nuestros clubes asociados y disfruta del mejor juego.</p>
    </div>

    <div class="row mt-5">
        <!-- Pista 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="text-center">
                    <img src="{{ asset('img/pista1.jpg') }}" class="card-img-top service-img" alt="Pista Indoor">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Pista Indoor Premium</h5>
                    <p class="card-text flex-grow-1">Pista profesional con suelo de césped sintético y techada para cualquier clima.</p>
                    <p class="fw-bold">$20 / hora</p>
                    <button class="btn btn-success mt-auto">Reservar Ahora</button>
                </div>
            </div>
        </div>

        <!-- Pista 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="text-center">
                    <img src="{{ asset('img/pista.jpg') }}" class="card-img-top service-img" alt="Pista Exterior">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Pista Exterior</h5>
                    <p class="card-text flex-grow-1">Disfruta del mejor pádel al aire libre en una pista con las mejores condiciones.</p>
                    <p class="fw-bold">$15 / hora</p>
                    <button class="btn btn-success mt-auto">Reservar Ahora</button>
                </div>
            </div>
        </div>

        <!-- Pista 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="text-center">
                    <img src="{{ asset('img/pista2.jpg') }}" class="card-img-top service-img" alt="Pista VIP">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Pista VIP</h5>
                    <p class="card-text flex-grow-1">Experiencia premium con iluminación avanzada y gradas para espectadores.</p>
                    <p class="fw-bold">$30 / hora</p>
                    <button class="btn btn-success mt-auto">Reservar Ahora</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
