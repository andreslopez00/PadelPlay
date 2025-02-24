<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PadelPlay - Tu Tienda de Pádel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">PadelPlay</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Alquiler de Pistas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonios</a></li>
                    <li class="nav-item">
                       <!-- Botón del carrito en la navbar -->
<li class="nav-item">
    <a class="nav-link position-relative" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
        🛒 <span class="badge bg-danger" id="cart-count">0</span>
    </a>
</li>

<!-- Modal del Carrito -->
<div class="modal fade" id="cartModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Carrito de Compras</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul id="cart-items" class="list-group">
                    <!-- Items del carrito generados con JavaScript -->
                </ul>
                <p class="fw-bold mt-3">Total: $<span id="cart-total">0.00</span></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="checkout-btn">Pagar</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="btn btn-danger text-white ms-3" href="{{ url('/logout') }}">Cerrar Sesión</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-warning text-dark ms-3" href="{{ url('/login') }}">Iniciar Sesión</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section Mejorado -->
    <header class="hero-section d-flex align-items-center text-center text-white" style="background: url('{{ asset('img/lolo.jpeg') }}') no-repeat center center; background-size: cover; height: 80vh;">
        <div class="overlay" style="background: rgba(0, 0, 0, 0.5); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
            <div class="container">
                <h1 class="display-3 fw-bold">Descubre el Mundo del Pádel</h1>
                <p class="lead">Compra equipo de calidad y reserva pistas en los mejores clubes.</p>
                <a href="{{ url('/products') }}" class="btn btn-primary btn-lg mt-3 shadow-lg">Explorar Tienda</a>
            </div>
        </div>
    </header>


    <!-- Sobre Nosotros -->
    <section id="about" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold">Sobre Nosotros</h2>
            <p class="lead">En PadelPlay ofrecemos los mejores productos y el mejor servicio para los amantes del pádel.</p>
            <div class="row mt-4">
                <div class="col-md-6">
                    <img src="https://source.unsplash.com/600x400/?padel" class="img-fluid rounded shadow-sm" alt="Sobre Nosotros">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="text-muted">Desde equipamiento profesional hasta reservas en los mejores clubes, PadelPlay es tu destino ideal para todo lo relacionado con el pádel.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos Destacados -->
    <section id="products" class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold">Nuestros Productos</h2>
            <p class="lead">Descubre nuestra selección premium de productos.</p>
            <div class="row" id="product-list">
                <!-- Productos generados dinámicamente con JavaScript -->
            </div>
        </div>
    </section>

    <!-- Alquiler de Pistas -->
    <section id="services" class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="fw-bold">Alquiler de Pistas</h2>
            <p class="lead">Reserva fácilmente una pista de pádel y disfruta del mejor juego.</p>
            <a href="#" class="btn btn-success btn-lg shadow-lg">Reservar Ahora</a>
        </div>
    </section>

    <!-- Testimonios Mejorados -->
    <section id="testimonials" class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold">Lo Que Dicen Nuestros Clientes</h2>
            <div id="testimonialCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <p class="lead">“PadelPlay me ha ayudado a mejorar mi juego con sus productos de alta calidad.”</p>
                        <p class="fw-bold">- Juan Pérez</p>
                    </div>
                    <div class="carousel-item">
                        <p class="lead">“Reservar pistas nunca ha sido tan fácil. ¡Servicio increíble!”</p>
                        <p class="fw-bold">- Ana López</p>
                    </div>
                    <div class="carousel-item">
                        <p class="lead">“El mejor equipo de pádel al mejor precio. 100% recomendado.”</p>
                        <p class="fw-bold">- Carlos Ramírez</p>
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

    <!-- Footer Mejorado -->
    <footer class="footer bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">© 2025 PadelPlay. Todos los derechos reservados.</p>
            <div class="mt-2">
                <a href="#" class="text-white me-3">Facebook</a>
                <a href="#" class="text-white me-3">Instagram</a>
                <a href="#" class="text-white">Twitter</a>
            </div>
        </div>
    </footer>

</body>
</html>
