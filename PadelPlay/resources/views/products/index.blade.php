<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PadelPlay - Tu Tienda de Pádel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
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

                @if(Auth::check())
                    <!-- Si el usuario está autenticado, muestra Cerrar Sesión -->
                    <li class="nav-item">
                        <a class="btn btn-danger text-white ms-3" href="{{ url('/logout') }}">Cerrar Sesión</a>
                    </li>
                @else
                    <!-- Si el usuario NO está autenticado, muestra Iniciar Sesión -->
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

    <!-- Sobre Nosotros -->
    <section id="about" class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="fw-bold">Sobre Nosotros</h2>
            <p class="lead">Somos la mejor tienda online de pádel, ofreciendo productos de alta calidad y alquiler de pistas en toda España.</p>
        </div>
    </section>

    <!-- Productos Destacados -->
    <section id="products" class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold">Nuestros Productos</h2>
            <p class="lead">Explora nuestra selección de palas, pelotas y accesorios para mejorar tu juego.</p>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Ver Tienda</a>
        </div>
    </section>

    <!-- Alquiler de Pistas -->
    <section id="services" class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="fw-bold">Alquiler de Pistas</h2>
            <p class="lead">Reserva fácilmente tu pista de pádel en nuestros clubes asociados.</p>
            <a href="#" class="btn btn-success">Reservar Ahora</a>
        </div>
    </section>

    <!-- Testimonios -->
    <section id="testimonials" class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold">Lo Que Dicen Nuestros Clientes</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4 shadow-sm">
                        <p>“PadelPlay me ha ayudado a mejorar mi juego con su increíble selección de productos.”</p>
                        <p class="fw-bold">- Juan Pérez</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 shadow-sm">
                        <p>“Reservar pistas nunca ha sido tan fácil y rápido. ¡Excelente servicio!”</p>
                        <p class="fw-bold">- Ana López</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 shadow-sm">
                        <p>“Los productos son de alta calidad y el envío es rápido. Muy recomendado.”</p>
                        <p class="fw-bold">- Carlos Ramírez</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
