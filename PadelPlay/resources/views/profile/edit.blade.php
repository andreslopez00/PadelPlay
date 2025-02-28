@extends('layouts.app')

@section('title', 'Editar Perfil - PadelPlay')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Editar Perfil</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user-profile-information.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name">Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') ?? auth()->user()->name }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') ?? auth()->user()->email }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Actualizar Perfil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection