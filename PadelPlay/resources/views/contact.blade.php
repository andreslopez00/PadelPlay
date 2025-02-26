@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h2 class="fw-bold">Contáctanos</h2>
        <p class="lead">¿Tienes dudas o sugerencias? Envíanos un mensaje y nuestro equipo te responderá lo antes posible.</p>
    </div>

    <div class="row mt-5">
        <!-- Formulario de Contacto -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h4 class="fw-bold text-center">Déjanos tu Mensaje</h4>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensaje</label>
                        <textarea class="form-control" rows="4" required></textarea>
                    </div>
                    <button class="btn btn-primary w-100">Enviar Mensaje</button>
                </form>
            </div>
        </div>

        <!-- Información de Contacto -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h4 class="fw-bold text-center">Nuestra Ubicación 📍</h4>
                <p class="text-muted text-center">
                    Avenida de las Ciencias, Sevilla Este, Sevilla
                </p>
                <!-- Google Maps -->
                <iframe
                    class="rounded shadow-sm"
                    width="100%"
                    height="300"
                    frameborder="0"
                    style="border:0;"
                    allowfullscreen
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.497881188996!2d-5.934243284315887!3d37.401924279829846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126da2e5e6216d%3A0xabc123456789abcd!2sAvenida+de+las+Ciencias%2C+Sevilla!5e0!3m2!1ses!2ses!4v1670012345678"
                ></iframe>
                <p class="text-muted mt-3 text-center">
                    📧 <strong>Email:</strong> contacto@padelplay.com <br>
                    📞 <strong>Teléfono:</strong> +34 654 321 987
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
