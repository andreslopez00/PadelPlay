@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Panel de Administración</h2>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">Gestiona los productos de la tienda.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Gestionar Productos</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pistas</h5>
                    <p class="card-text">Gestiona las pistas disponibles.</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Gestionar Pistas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
