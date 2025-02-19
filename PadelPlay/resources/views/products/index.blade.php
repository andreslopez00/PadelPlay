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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link position-relative" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                            🛒 <span class="badge bg-danger" id="cart-count">0</span>
                        </a>
                    </li>

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

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="overlay">
            <div class="container">
                <h1 class="display-4 fw-bold">Bienvenido a PadelPlay</h1>
                <p class="lead">Tu tienda online para encontrar el mejor equipo de pádel y alquilar pistas fácilmente.</p>
                <a href="{{ url('/register') }}" class="btn cta-btn text-white mt-3">¡Regístrate ahora!</a>
            </div>
        </div>
    </header>

    <!-- Productos -->
    <section id="products" class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold">Nuestros Productos</h2>
            <p class="lead">Explora nuestra selección de palas, pelotas y accesorios.</p>
            <div class="row" id="product-list">
                <!-- Productos generados dinámicamente con JavaScript -->
            </div>
        </div>
    </section>

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

    <!-- Footer -->
    <footer class="footer text-center">
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
