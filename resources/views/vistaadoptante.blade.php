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

</div>
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
    <!-- Menú Lateral -->
     <main>
     <nav class="side-menu" id="sideMenu">

     <a href="{{ url('/perfil') }}"><i class="fas fa-user"></i> Perfil</a>
<a href="{{ url('/estadisticas') }}"><i class="fas fa-chart-bar"></i> Estadísticas</a>
<a href="{{ url('/cuidados') }}"><i class="fas fa-heart"></i> Cuidados</a>
<a href="{{ route('viabilidadestudiovista.mostrar') }}"><i class="fas fa-file-alt"></i> Viabilidad de Estudio</a>
<a href="{{ route('seguimientovisitasvista.mostrar') }}"><i class="fas fa-folder"></i> Seguimiento de Visitas</a>
</nav>
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
    
</div>

    
        <script>
        function toggleMenu()
            const menu = document.getElementById("sideMenu");
            menu.classList.toggle("menu-open");
            
            // Ajustar el margen del cuerpo cuando el menú está abierto
            if (menu.classList.contains("menu-open")) {
                document.body.style.marginLeft = "250px";
            } else {
                document.body.style.marginLeft = "0";
            }
            // Carrusel
        let currentSlide = 0;
        const slides = document.querySelectorAll(".carousel-slide");
        
        function showSlide(n) {
            // Oculta todas las diapositivas
            slides.forEach(slide => {
                slide.classList.remove("active");
            });
            
            // Ajusta el índice si es necesario
            if (n >= slides.length) currentSlide = 0;
            if (n < 0) currentSlide = slides.length - 1;
            
            // Muestra la diapositiva actual
            slides[currentSlide].classList.add("active");
        }
        
        function moveSlide(n) {
            currentSlide += n;
            showSlide(currentSlide);
        }
        
        // Inicialización
        document.addEventListener("DOMContentLoaded", () => {
            showSlide(0);
            
            // Cambio automático cada 5 segundos
            setInterval(() => moveSlide(1), 5000);
        });
    </script>
    </main>
    
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Furry Friends - Todos los derechos reservados.</p>
    </footer>
    



    
        
</body>
</html>