@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h2 class="fw-bold text-success">¡Pago Exitoso! 🎉</h2>
    <p class="lead">Tu compra se ha completado con éxito. Revisa tu correo para más detalles.</p>
    <a href="{{ route('shop.index') }}" class="btn btn-primary">Volver a la Tienda</a>
</div>
@endsection
