<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <label for="role_id">Rol:</label>
        <select id="role_id" name="role_id" required>
            @foreach(App\Models\Role::all() as $role)
                <option value="{{ $role->id }}">{{ $role->tipo }}</option>
            @endforeach
        </select>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
