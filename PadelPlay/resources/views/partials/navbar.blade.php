<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/dashboard') }}">PadelPlay</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Sobre Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Alquiler de Pistas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/testimonials') }}">Testimonios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contacto</a></li>
            </ul>

            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ url('/cart') }}">
                            🛒 <span class="badge bg-danger" id="cart-count">0</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/settings') }}">Ajustes</a></li>
                            <li><a class="dropdown-item" href="{{ route('verification.notice') }}">Verificar Email</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-warning text-dark" href="{{ url('/login') }}">Iniciar Sesión</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>