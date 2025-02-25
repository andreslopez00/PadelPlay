@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h2 class="fw-bold">Contáctanos</h2>
    <p class="lead">Si tienes preguntas o quieres más información, contáctanos.</p>
    <form class="w-50 mx-auto">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Mensaje</label>
            <textarea class="form-control" rows="4"></textarea>
        </div>
        <button class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
