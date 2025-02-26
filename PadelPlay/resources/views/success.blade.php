@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h2 class="fw-bold text-success">¡Pago Exitoso!</h2>
    <p class="lead">Gracias por tu compra. Te hemos enviado un correo con los detalles.</p>
    <a href="{{ url('/products') }}" class="btn btn-primary mt-3">Seguir Comprando</a>
</div>

<script>
    localStorage.removeItem("cart"); // 🔥 Aseguramos que se vacíe después del pago
</script>

@endsection

