@extends('layouts.app')

@section('title', 'Verificar Email - PadelPlay')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Verificar Email</h3>
                </div>
                <div class="card-body">
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success">
                            Se ha enviado un nuevo enlace de verificación a tu dirección de email.
                        </div>
                    @endif

                    <div class="mb-4">
                        Gracias por registrarte. Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico 
                        haciendo clic en el enlace que te acabamos de enviar? Si no has recibido el email, con gusto 
                        te enviaremos otro.
                    </div>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Reenviar email de verificación
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection