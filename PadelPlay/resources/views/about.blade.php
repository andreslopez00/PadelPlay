@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h2 class="fw-bold">Sobre Nosotros</h2>
        <p class="lead">Somos <strong>PadelPlay</strong>, la tienda de referencia para los amantes del pádel en Sevilla Este. Ofrecemos productos de alta calidad, un sistema de reservas de pistas y el mejor asesoramiento para que disfrutes del pádel al máximo.</p>
    </div>

    <!-- Sección de Historia y Valores -->
    <div class="row mt-5">
        <div class="col-md-6">
            <h3 class="fw-bold">Nuestra Historia</h3>
            <p class="text-muted">
                Fundada en 2024, <strong>PadelPlay</strong> nació con la misión de ofrecer a los jugadores de pádel los mejores productos y un servicio de calidad excepcional. Nos enorgullece ser una empresa sevillana que ha crecido con la pasión por este deporte.
            </p>
            <p class="text-muted">
                Con más de 2 años de experiencia en el sector, trabajamos con las mejores marcas y ofrecemos un sistema de reservas fácil y accesible para que siempre encuentres una pista disponible.
            </p>
        </div>
        <div class="col-md-6">
            <img src="https://source.unsplash.com/600x400/?padel-court" class="img-fluid rounded shadow-sm" alt="Historia de PadelPlay">
        </div>
    </div>

    <!-- Ubicación de la Empresa -->
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="https://source.unsplash.com/600x400/?sevilla" class="img-fluid rounded shadow-sm" alt="Ubicación Sevilla">
        </div>
        <div class="col-md-6">
            <h3 class="fw-bold">¿Dónde Estamos?</h3>
            <p class="text-muted">
                Nuestra tienda física y oficina se encuentran en <strong>Sevilla Este, Avenida de las Ciencias</strong>. Estamos en una ubicación estratégica para que puedas venir a probar nuestros productos o resolver cualquier duda con nuestro equipo de expertos.
            </p>
            <p class="text-muted">
                Si necesitas ayuda, no dudes en visitarnos o llamarnos. ¡Estaremos encantados de atenderte!
            </p>
        </div>
    </div>

    <!-- Mapa de Google Maps -->
    <div class="text-center mt-5">
        <h3 class="fw-bold">Encuéntranos Aquí 📍</h3>
        <iframe 
            class="mt-3 rounded shadow-sm"
            width="100%" 
            height="400" 
            frameborder="0" 
            style="border:0; max-width: 800px;"
            allowfullscreen 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.497881188996!2d-5.934243284315887!3d37.401924279829846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126da2e5e6216d%3A0xabc123456789abcd!2sAvenida+de+las+Ciencias%2C+Sevilla!5e0!3m2!1ses!2ses!4v1670012345678"
        ></iframe>
    </div>
</div>
@endsection
