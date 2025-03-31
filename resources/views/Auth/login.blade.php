
<div class="fondo-imagen">
    <div class="contenedor-titulo">
        <h1>Furry Friends</h1>
        <link rel="stylesheet" href="{{ asset('cssone/login.css') }}">
    </div>
    <button class="boton-inicio" type="button">
        <a href="{{ url('/') }}">Inicio</a>
    </button>
    <br>

    <div class="contenedor-login">
        <div class="login">
            <h2>Iniciar sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="campo-usuario">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" placeholder="Introduce tu correo" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="campo-contraseña">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="recordar-contraseña">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Recordar contraseña</label>
                </div>

                <button type="submit">Iniciar sesión</button>
                <br>
                <center>
                    <p>Inicia sesión con <a href="#">número de teléfono</a></p>
                    <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
                    
                </center>
            </form>
        </div>
    </div>
</div>
