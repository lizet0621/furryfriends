<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidados para Perritos</title>
    <link rel="stylesheet" href="{{ asset('cssone/cuidados.css') }}">
</head>
<body>

    <!-- 🟦 Cabecera sin línea negra -->
    <header class="header">
        <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" class="logo">
        <h1>🐶 Cuidados y Amor para los Perritos 🐶</h1>
    </header>

    <!-- 📌 Contenedor principal con fondo blanco -->
    <div class="main-container">
        
        <!-- 🔹 Contenedor del título -->
        <div class="title-container">
            <h2>Aprende a cuidar a tu perrito con amor </h2>
            <form action="{{ url()->previous() }}">
    <button type="submit" class="btn btn-primary"></form>🏠 Volver al Inicio</button>
            </a>
        </div>

        <!-- 🔹 Contenedor de información -->
        <div class="info-container">
            <!-- Sección de comentarios -->
            <section class="comments-section">
                <h2>❤ Comentarios sobre cuidados ❤</h2>
                <div class="comment">
                    <p>"Siempre es importante llevar a tu perrito al veterinario cada 6 meses."</p>
                </div>
                <div class="comment">
                    <p>"Dale mucho amor y un espacio cómodo para dormir."</p>
                </div>
                <div class="comment">
                    <p>"No olvides desparasitarlo y mantener sus vacunas al día."</p>
                </div>
                <div class="comment">
                    <p>"El agua limpia y fresca es fundamental para su salud."</p>
                </div>
                <div class="comment">
                    <p>"Los juguetes son clave para su felicidad y estimulación mental."</p>
                </div>
            </section>

            <!-- Sección de consejos -->
            <section class="tips">
                <h2>📌 Consejos para cuidar a tu perro 📌</h2>
                <p>🐾 Aliméntalo con una dieta balanceada y de calidad.</p>
                <p>🐾 Sácalo a pasear todos los días para su ejercicio.</p>
                <p>🐾 Bríndale un ambiente seguro y lleno de amor.</p>
                <p>🐾 Cepilla su pelaje regularmente para evitar enredos.</p>
                <p>🐾 Enséñale trucos y obedece comandos básicos para su educación.</p>
                <p>🐾 Dale tiempo de calidad para fortalecer el vínculo con él.</p>

                <a href="https://www.youtube.com/results?search_query=cuidados+para+perros" target="_blank">
                    <button class="btn-tips">🎥 Ver más consejos en YouTube</button>
                </a>
            </section>
        </div>
    </div>

    <!-- 🔽 Pie de página -->
    <footer class="footer">
        <p>&copy; 2025 Furry Friends - Todos los derechos reservados 🐾</p>
    </footer>

</body>
</html>