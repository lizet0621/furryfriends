<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Conexión al CSS -->
    <link rel="stylesheet" href="{{ asset('cssone/login.css') }}">
</head>

<body>
    <div class="fondo-imagen">
        <div class="contenedor-titulo">
            <h1>Furry Friends</h1>
        </div>
        <button class="boton-inicio" type="button">
            <a href="{{ url('/') }}">Inicio</a>
        </button>
        <br>

        <div class="contenedor-login">
            <div class="login">
                <h2>Iniciar sesión</h2>

                <form id="loginForm" action="{{ route('login') }}" method="POST">
                    @csrf <!-- Token de seguridad para Laravel -->
                    
                    <div class="campo-usuario">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" name="email" placeholder="Introduce tu correo" required>
                    </div>

                    <div class="campo-contraseña">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
                    </div>

                    <div class="recordar-contraseña">
                        <input type="checkbox" id="recordar" name="remember">
                        <label for="recordar">Recordar contraseña</label>
                    </div>

                    <button type="submit">Iniciar sesión</button>
                    
           
                    <br>
                    <center>
                        <p>Inicia sesión con <a href="#">número de teléfono</a></p>
                        <p>¿No tienes cuenta? <a href="{{ route('roles') }}">Regístrate aquí</a></p>
                        <a href="{{ route('welcome') }}">Olvidaste tu contraseña</a>
                    </center>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>