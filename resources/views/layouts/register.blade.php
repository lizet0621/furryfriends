<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Furry Friends - Registro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: sans-serif;
    }

    header {
        background-color: #fdfdfd;
        padding: 15px 30px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        width: 100%;
    }

    .header-container {
        display: flex;
        justify-content: space-between; /* Distribuye los elementos en los extremos */
        align-items: center;
        width: 100%;
    }

    .logo-container {
        display: flex;
        align-items: center;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .logo {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 15px;
    }

    h1 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        top: 50%;
    }

    .login-container {
        margin-left: auto; /* Empuja el botón hacia la derecha */
    }

    .login-button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .login-button:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>

    <header>
        <div class="header-container">
            <div class="placeholder-div"></div> <!-- Espacio izquierdo para balance -->
            
            <div class="logo-container">
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="logo" class="logo">
                <h1>Furry Friends</h1>
            </div>

            <div class="login-container">
                <a href="{{ route('login') }}" class="login-button">Iniciar Sesión</a>
            </div>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>

</body>
</html>