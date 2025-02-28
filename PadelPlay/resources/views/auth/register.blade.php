<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - PadelPlay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center">Registro</h3>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Nombre</label>
                                <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password">Contraseña</label>
                                <input id="password" type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Registrarse</button>
                        </form>

                        <div class="text-center mt-3">
                            <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>