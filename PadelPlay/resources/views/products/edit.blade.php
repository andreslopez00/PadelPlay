@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h2>Editar Producto</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    @if($product->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="height: 100px;">
                        </div>
                    @endif
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection