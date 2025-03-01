@extends('admin.dashboard')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Producto</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagen del Producto</label>
                <input type="file" name="image" class="form-control">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
@endsection
