@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Gestionar Pistas</h2>

    <a href="{{ route('admin.courts.create') }}" class="btn btn-success mb-3">Añadir Pista</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courts as $court)
    <div class="col-md-4">
        <div class="card shadow-sm">
            <img src="{{ asset('storage/' . $court->image) }}" class="card-img-top" alt="{{ $court->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $court->name }}</h5>
                <p class="card-text">{{ $court->location }}</p>
                <p class="fw-bold">${{ $court->price }}</p>
                <a href="{{ route('admin.courts.edit', $court) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('admin.courts.destroy', $court) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endforeach

        </tbody>
    </table>
</div>
@endsection
