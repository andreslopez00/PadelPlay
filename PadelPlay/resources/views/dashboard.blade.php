@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<header class="hero-section">
    <div class="container text-center hero-content">
        <h1 class="display-2 fw-bold text-uppercase">Domina la Pista con PadelPlay</h1>
        <p class="lead mt-3">La tienda definitiva para amantes del pádel. Equípate, mejora y juega al máximo nivel.</p>
        <a href="{{ url('/products') }}" class="btn btn-warning btn-lg mt-4 shadow-lg fw-bold">Explorar Tienda</a>
        <a href="{{ url('/services') }}" class="btn btn-outline-light btn-lg mt-4 ms-3">Reservar Pista</a>
    </div>
</header>

<!-- Sección de Ventajas -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold">¿Por qué elegir PadelPlay?</h2>
        <p class="lead">Descubre lo que nos hace diferentes y por qué somos la mejor opción para los jugadores de pádel.</p>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="p-4 shadow-sm bg-white rounded advantage-box">
                    <img src="../img/productos.jpg" class="advantage-img mb-3" alt="Equipamiento">
                    <h4>Equipamiento Profesional</h4>
                    <p>Las mejores marcas, calidad garantizada y precios imbatibles.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow-sm bg-white rounded advantage-box">
                    <img src="../img/pista.jpg" class="advantage-img mb-3" alt="Reservas">
                    <h4>Reservas Rápidas</h4>
                    <p>Alquila tu pista en segundos con nuestra plataforma intuitiva.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow-sm bg-white rounded advantage-box">
                    <img src="../img/entreno.jpg" class="advantage-img mb-3" alt="Coaching">
                    <h4>Mejora tu Juego</h4>
                    <p>Accede a entrenamientos exclusivos y mejora tu nivel en la pista.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Productos Destacados -->
<section class="py-5 text-center">
    <div class="container">
        <h2 class="fw-bold">🔥 Lo Más Vendido 🔥</h2>
        <p class="lead">Los favoritos de nuestros clientes. ¡No te los pierdas!</p>
        <div class="row mt-4">
            @if($featuredProducts->isEmpty())
                <p class="text-muted">No hay productos destacados en este momento.</p>
            @else
                @foreach($featuredProducts as $product)
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('img/product-placeholder.jpg') }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">${{ number_format($product->price, 2) }}</p>
                                <button class="btn btn-primary add-to-cart" 
                                        data-id="{{ $product->id }}" 
                                        data-name="{{ $product->name }}" 
                                        data-price="{{ $product->price }}">
                                    Agregar al carrito
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>


<!-- Testimonios -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold">🎾 Lo que dicen nuestros clientes 🎾</h2>
        <div id="testimonialCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <blockquote class="blockquote">
                        <p class="lead">"PadelPlay ha cambiado mi forma de jugar. ¡Productos increíbles y servicio impecable!"</p>
                        <footer class="blockquote-footer">Juan Pérez</footer>
                    </blockquote>
                </div>
                <div class="carousel-item">
                    <blockquote class="blockquote">
                        <p class="lead">"La mejor tienda de pádel que he encontrado. Gran calidad y precios ajustados."</p>
                        <footer class="blockquote-footer">Ana López</footer>
                    </blockquote>
                </div>
                <div class="carousel-item">
                    <blockquote class="blockquote">
                        <p class="lead">"Reservar pistas nunca ha sido tan fácil. Un servicio excepcional."</p>
                        <footer class="blockquote-footer">Carlos Ramírez</footer>
                    </blockquote>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../img/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    padding: 100px 0;
    margin-bottom: 30px;
}

.advantage-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
}

.advantage-box {
    transition: transform 0.3s ease;
}

.advantage-box:hover {
    transform: translateY(-10px);
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}
</style>
@endpush