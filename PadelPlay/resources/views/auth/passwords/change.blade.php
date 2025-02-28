@extends('layouts.app')

@section('title', 'Cambiar Contraseña - PadelPlay')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Cambiar Contraseña</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->updatePassword->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->updatePassword->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user-password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="password">Nueva Contraseña</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                            <input id="password_confirmation" type="password" class="form-control" 
                                   name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Actualizar Contraseña
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection