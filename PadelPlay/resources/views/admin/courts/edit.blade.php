@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Editar Pista</h2>

    <form action="{{ route('admin.courts.update', $court) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $court->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicación</label>
            <input type="text" name="location" class="form-control" value="{{ $court->location }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $court->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

