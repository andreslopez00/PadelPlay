@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h3>Editar Producto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('productos.update', $producto) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio:</label>
                    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
@endsection
