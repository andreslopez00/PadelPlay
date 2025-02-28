@extends('layouts.app')

@section('title', 'Ajustes - PadelPlay')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/settings/profile') }}" class="list-group-item list-group-item-action {{ request()->is('settings/profile') ? 'active' : '' }}">
                    Perfil
                </a>
                <a href="{{ url('/settings/password') }}" class="list-group-item list-group-item-action {{ request()->is('settings/password') ? 'active' : '' }}">
                    Cambiar Contraseña
                </a>
                @if(!auth()->user()->hasVerifiedEmail())
                    <a href="{{ route('verification.notice') }}" class="list-group-item list-group-item-action {{ request()->is('email/verify') ? 'active' : '' }}">
                        Verificar Email
                    </a>
                @endif
            </div>
        </div>
        <div class="col-md-9">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @yield('settings-content')

            @if(!request()->is('settings/profile') && !request()->is('settings/password') && !request()->is('email/verify'))
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ajustes de Cuenta</h5>
                        <p class="card-text">Selecciona una opción del menú lateral para gestionar tu cuenta.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection