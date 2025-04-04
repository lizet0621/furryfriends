<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Roles</title>
    <link rel="stylesheet" href="{{ asset('cssone/registro.css') }}">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="{{ asset('imagenes/logo.jpg') }}" alt="logo" class="logo">
            <h1>Furry Friends</h1>
        </div>
    </header>
    
    <div class="container">
        <h1>Selecciona tu Rol</h1>
        <div class="buttons">
            <button id="adoptante-btn" class="btn">Registro como Adoptante</button>
            <button id="refugio-btn" class="btn">Registro como Refugio Físico</button>
            <button id="persona-btn" class="btn">Registro como Persona Natural</button>
        </div>
        
        <div id="form-container">
            <!-- Aquí se cargarán los formularios dinámicamente -->
        </div>

        <div class="back-button">
            <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al Inicio</a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const formContainer = document.getElementById("form-container");

            const token = '{{ csrf_token() }}'; // Extraemos token desde Blade

            const forms = {
                adoptante: `
                    <form action="{{ route('register') }}" method="POST">
                        <input type="hidden" name="_token" value="${token}">
                        <h2>Registro como Adoptante</h2>
                        <label>Nombre:</label><input type="text" name="name" required>
                        <label>Correo Electrónico:</label><input type="email" name="email" required>
                        <label>Teléfono:</label><input type="text" name="telefono" required>
                        <label>Dirección:</label><input type="text" name="direccion" required>
                        <label>Contraseña:</label><input type="password" name="password" required>
                        <label>Confirmar Contraseña:</label><input type="password" name="password_confirmation" required>
                        <input type="hidden" name="id_rol" value="1">
                        <button type="submit" class="btn">Registrar</button>
                    </form>
                `,
                refugio: `
                    <form action="{{ route('register') }}" method="POST">
                        <input type="hidden" name="_token" value="${token}">
                        <h2>Registro como Refugio Físico</h2>
                        <label>Nombre del Refugio:</label><input type="text" name="name" required>
                        <label>Correo Electrónico:</label><input type="email" name="email" required>
                        <label>Teléfono:</label><input type="text" name="telefono" required>
                        <label>Dirección:</label><input type="text" name="direccion" required>
                        <label>Ciudad:</label><input type="text" name="ciudad" required>
                        <label>Capacidad (número de perros):</label><input type="number" name="capacidad" required>
                        <label>Horarios de Atención:</label><input type="text" name="horarios" required>
                        <label>Nombre del Responsable:</label><input type="text" name="responsable" required>
                        <label>Servicios Ofrecidos:</label><textarea name="servicios" required></textarea>
                        <label>Contraseña:</label><input type="password" name="password" required>
                        <label>Confirmar Contraseña:</label><input type="password" name="password_confirmation" required>
                        <input type="hidden" name="id_rol" value="3">
                        <button type="submit" class="btn">Registrar</button>
                    </form>
                `,
                persona: `
                    <form action="{{ route('register') }}" method="POST">
                        <input type="hidden" name="_token" value="${token}">
                        <h2>Registro como Persona Natural</h2>
                        <label>Nombre Completo:</label><input type="text" name="name" required>
                        <label>Teléfono:</label><input type="text" name="telefono" required>
                        <label>Correo Electrónico:</label><input type="email" name="email" required>
                        <label>Dirección:</label><input type="text" name="direccion" required>
                        <label>Contraseña:</label><input type="password" name="password" required>
                        <label>Confirmar Contraseña:</label><input type="password" name="password_confirmation" required>
                        <input type="hidden" name="id_rol" value="2">
                        <button type="submit" class="btn">Registrar</button>
                    </form>
                `
            };

            document.getElementById("adoptante-btn").addEventListener("click", () => {
                formContainer.innerHTML = forms.adoptante;
            });

            document.getElementById("refugio-btn").addEventListener("click", () => {
                formContainer.innerHTML = forms.refugio;
            });

            document.getElementById("persona-btn").addEventListener("click", () => {
                formContainer.innerHTML = forms.persona;
            });
        });
    </script>
</body>
</html>
