@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Añadir Pista</h2>

    <form action="{{ route('admin.courts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre de la Pista</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Ubicación</label>
        <input type="text" name="location" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagen de la Pista</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
