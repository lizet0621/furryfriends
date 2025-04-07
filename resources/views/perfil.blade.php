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

    <!-- 🔙 Botón Volver -->
    <div style="position: absolute; top: 20px; left: 20px;">
        <a href="/" onclick="event.preventDefault(); window.history.length > 1 ? history.back() : window.location='/'" class="btn-secondary">⬅ Volver</a>
    </div>

    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ strtoupper(substr($usuario->name ?? $usuario->email, 0, 1)) }}
                </div>
                <h1 class="profile-name">{{ $usuario->name ?? 'Usuario' }}</h1>
                <p class="profile-email"><strong>Email:</strong> {{ $usuario->email }}</p>

                @if(!empty($usuario->telefono))
                    <p class="profile-email"><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
                @endif

                @if(!empty($usuario->direccion))
                    <p class="profile-email"><strong>Dirección:</strong> {{ $usuario->direccion }}</p>
                @endif
            </div>

            @if (Auth::check())
                <button id="editButton" class="btn btn-secondary">Editar</button>
            @endif

            <form id="editForm" action="{{ route('perfil.actualizar') }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <label>Nombre:</label>
                    <input type="text" name="name" value="{{ $usuario->name }}" required>
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

                <button type="submit" class="btn btn-success">Guardar cambios</button>
            </form>

            <form action="{{ route('perfil.eliminar') }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar tu cuenta?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            document.getElementById('editForm').style.display = 'block';
            this.style.display = 'none';
        });
    </script>
</body>
</html>
