@extends('layouts.app')

@section('title', 'Restablecer Contraseña - PadelPlay')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">Restablecer Contraseña</h3>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ request()->route('token') }}">

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">Nueva Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm">Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" 
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Restablecer Contraseña
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection