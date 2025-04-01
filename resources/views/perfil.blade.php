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
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="{{ asset('cssone/perfil.css') }}">
</head>








<body>
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <!-- Avatar con inicial -->
                <div class="profile-avatar">
                    {{ strtoupper(substr($usuario->name ?? $usuario->email, 0, 1)) }}
                </div>
                <h1 class="profile-name">{{ $usuario->name ?? 'Usuario' }}</h1>
                <p class="profile-email">{{ $usuario->email }}</p>
            </div>

            <!-- Mostrar botón para editar si el usuario está autenticado -->
            @if (Auth::check())
                <button id="editButton" class="btn btn-secondary">Editar</button>
            @endif

            <!-- Formulario para editar perfil (oculto inicialmente) -->
            <form id="editForm" action="{{ route('perfil.actualizar') }}" method="POST" style="display: none;">
                @csrf
                <div class="input-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="{{ $usuario->name }}" required>
                </div>

                <div class="input-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="{{ $usuario->email }}" required>
                </div>

                <div class="input-group">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" value="{{ $usuario->telefono }}">
                </div>

                <div class="input-group">
                    <label>Dirección:</label>
                    <input type="text" name="direccion" value="{{ $usuario->direccion }}">
                </div>

                <button type="submit" class="btn">Guardar cambios</button>
            </form>

            <a href="{{ route('home') }}" class="btn btn-secondary">Volver al inicio</a>
        </div>
    </div>

    <script>
        // Mostrar el formulario de edición al hacer clic en el botón "Editar"
        document.getElementById('editButton').addEventListener('click', function() {
            document.getElementById('editForm').style.display = 'block';  // Muestra el formulario de edición
            this.style.display = 'none';  // Oculta el botón de editar
        });
    </script>
</body>
</html>