<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/dashboard') }}">PadelPlay</a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Sobre Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Alquiler de Pistas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/testimonials') }}">Testimonios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contacto</a></li>
                <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ url('/cart') }}">
                            🛒 <span class="badge bg-danger" id="cart-count">0</span>
                        </a>
                    </li>

</li>

                @if(Auth::check())
                    <li class="nav-item"><a class="btn btn-danger text-white ms-3" href="{{ url('/logout') }}">Cerrar Sesión</a></li>
                @else
                    <li class="nav-item"><a class="btn btn-warning text-dark ms-3" href="{{ url('/login') }}">Iniciar Sesión</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
