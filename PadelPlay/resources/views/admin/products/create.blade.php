@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Añadir Producto</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Producto</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagen del Producto</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>
    </div>
@endsection
