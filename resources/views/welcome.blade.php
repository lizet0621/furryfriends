@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furry Friends</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('cssone/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('cssone/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contra.css') }}">

</head>

<body> 
    
    <header>
    <!-- Menú Hamburguesa -->
    <div class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>
    
    <!-- Header -->
    <header>
        <div class="logo-container">
        <img src="{{ asset('imagenes/logo.jpg') }}" alt="logo" class="logo">




            <h1>Furry Friends</h1>
        </div>
    </header>
<body>
<div class="header-buttons">
    <a href="{{ route('login') }}" class="btn btn-primary">
    <i class="fas fa-sign-in-alt"></i> Iniciar sesión
</a>
    <a id="register-btn" class="btn btn-secondary">
    <i class="fas fa-user-plus"></i> Registrarse
</a>

@auth
    <!-- Si el usuario ha iniciado sesión -->
    <a href="{{ route('logout') }}" class="btn btn-danger"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
    </a>
    <!-- Formulario de Cerrar sesión -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth

</div>
    </header>

 <!-- Modal de Registro -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>¿Cómo deseas registrarte?</h2>
        <a href="registroadoptante" class="btn btn-primary" data-tooltip="🔹 Regístrate como adoptante para buscar y adoptar perros 🐶.">Registrarse como Adoptante</a>

<a href="registrorefugio" class="btn btn-secondary" data-tooltip="🏠 Regístrate como refugio para publicar perros en adopción.">Registrarse como Refugio</a>

    </div>
</div>



    <!-- Menú Lateral -->
     <main>
    <nav class="side-menu" id="sideMenu">
    <a href="{{ route('perfil') }}"><i class="fas fa-user"></i> Perfil</a>
        <a href="{{ url('/estadisticas') }}"><i class="fas fa-chart-bar"></i> Estadísticas</a>
        <a href="cuidados"><i class="fas fa-cog"></i> Cuidados</a>
        <a href="administracion"><i class="fas fa-cog"></i> Administración</a>
    </nav>
    
    <!-- Modal de Contraseña -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg p-3 mb-5 bg-white rounded">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="passwordModalLabel">🔒 Acceso a Administración</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="password-form">
                    <div class="mb-3">
                        <label for="password" class="form-label">🔑 Digite la Contraseña</label>
                        <input type="password" class="form-control border-primary" id="password" placeholder="••••••" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Ingresar</button>
                </form>
                <div id="error-message" class="text-danger mt-2 text-center" style="display: none;">
                    ❌ Contraseña incorrecta. Inténtalo nuevamente.
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Contenido Principal -->
    <div class="carousel-container">
    <div class="carousel-slide active">
        <img src="{{ asset('imagenes/a.jpg') }}" alt="Imagen 1" class="carousel-image">
    </div>

    <div class="carousel-slide">
        <img src="{{ asset('imagenes/cute.jpg') }}" alt="Cachorro en el campo" class="carousel-image">
    </div>

    <div class="carousel-slide">
        <img src="{{ asset('imagenes/f.jpg') }}" alt="Perro descansando" class="carousel-image">
    </div>

    <div class="carousel-slide">
        <img src="{{ asset('imagenes/golden1.jpg') }}" alt="Golden Retriever" class="carousel-image">
    </div>

    <button class="carousel-control prev" onclick="moveSlide(-1)">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="carousel-control next" onclick="moveSlide(1)">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>

<div class="action-buttons">
<a href="{{ route('perrosdisponibles') }}" class="btn btn-primary">
        <i class="fas fa-search"></i> Ver Perros en Adopción
    </a>
    <a href="registroperros" class="btn btn-secondary">
        <i class="fas fa-plus-circle"></i> Registra un cachorrito
    </a>
</div>


    </main>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Furry Friends - Todos los derechos reservados.</p>
    </footer>
    
        
</body>
</html>