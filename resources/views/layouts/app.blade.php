<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistema de Adopciones')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('Perros.index') }}">Perros</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('Perros.create') }}">Nuevo Perro</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('administracion') }}">Administración</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ViabilidadEstudios.index') }}">viabilidad</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ViabilidadEstudios.create') }}">viabilidad</a></li>
                


                
            </ul>
        </div>
    </div>
</nav>

    {{-- Contenido Principal --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="bg-dark text-light text-center py-3 mt-4">
        <p class="mb-0">&copy; {{ date('Y') }} Furry Friends | Todos los derechos reservados</p>
    </footer>

    {{-- Scripts de Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>