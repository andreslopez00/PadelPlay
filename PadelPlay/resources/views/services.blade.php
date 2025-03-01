@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h2 class="fw-bold">Alquiler de Pistas</h2>
        <p class="lead">Reserva fácilmente tu pista de pádel en nuestros clubes asociados y disfruta del mejor juego.</p>
    </div>

    <div class="row mt-5">
    @foreach ($courts as $court)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="text-center">
                    @if($court->image)
                        <img src="{{ asset('storage/' . $court->image) }}" class="card-img-top service-img" alt="{{ $court->name }}">
                    @else
                        <img src="{{ asset('img/default-court.jpg') }}" class="card-img-top service-img" alt="Pista">
                    @endif
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $court->name }}</h5>
                    <p class="card-text flex-grow-1">{{ $court->location }}</p>
                    <p class="fw-bold">${{ number_format($court->price, 2) }} / hora</p>
                    <button class="btn btn-success mt-auto">Reservar Ahora</button>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>
@endsection
