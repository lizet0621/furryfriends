<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Administración')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('cssone/admin.css') }}"> <!-- Enlazamos el CSS externo -->
    <!-- Añadir animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>

    {{-- Cabecera --}}
    <header>
        <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" class="logo mb-3">
        <h1>Administración</h1>
    </header>

    {{-- Navegación --}}
    <div class="collapse navbar-collapse fadeIn" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('adoptantes.index') }}">Adoptantes</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('adoptantes.create') }}">Nuevo Adoptante</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('refugios.index') }}">Refugios</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('refugios.create') }}">Nuevo Refugio</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('Perros.index') }}">Perros</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('Perros.create') }}">Nuevo Perro</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('administracion') }}">Administración</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ViabilidadEstudios.index') }}">Viabilidad</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ViabilidadEstudios.create') }}">Viabilidad</a></li>
            
        </ul>
    </div>

    {{-- Contenedor Principal --}}
    <div class="container mt-4 content fadeIn">
        @yield('content')
    </div>

    {{-- Botón de Regresar al Inicio --}}

    {{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} Furry Friends | Todos los derechos reservados</p>
    </footer>

    {{-- Scripts de Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script para el botón "Regresar al inicio" --}}
    <script>
        // Función para mostrar el botón de "Regresar al inicio" cuando el usuario se desplaza hacia abajo
        window.addEventListener('scroll', function() {
            const backToTopBtn = document.querySelector('.back-to-top');
            if (window.scrollY > 200) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        // Función para regresar al inicio cuando se hace clic
        document.querySelector('.back-to-top').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>

</html>
