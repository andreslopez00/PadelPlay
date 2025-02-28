@extends('layouts.app')

@section('title', 'Iniciar Sesión - PadelPlay')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center">Iniciar Sesión</h3>

                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>

                    <div class="text-center mt-3">
                        <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
                        @if (Route::has('password.request'))
                            <p><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
