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
                <tr>
                    <td>{{ $court->name }}</td>
                    <td>{{ $court->location }}</td>
                    <td>${{ number_format($court->price, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.courts.edit', $court) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.courts.destroy', $court) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta pista?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
