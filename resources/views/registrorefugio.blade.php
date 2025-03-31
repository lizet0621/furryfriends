<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Refugio - Furry Friends</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/cssone/registro.css">
    <script defer src="{{ asset('js/registro.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Registro de Refugio</h2>

            <!-- Opción 1: Refugio Persona Natural -->
            <div class="tooltip-container">
                <button type="button" id="btnVirtual" class="btn-toggle">
                    Refugio (Persona Natural)
                </button>
                <span class="tooltip">Si rescatas y cuidas perros en casa sin contar con instalaciones formales.</span>
            </div>

            <form action="{{ route('registrorefugio.submit') }}" method="POST">
            @csrf
            <input type="hidden" id="tipo_refugio" name="tipo_refugio" value="natural">
             
                <div class="input-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="input-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" required>
                </div>

                <div class="input-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="password">Confirmar Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <!-- Opción 2: Refugio Físico -->
                <div class="tooltip-container">
                    <button type="button" id="btnFisico" class="btn-toggle">
                        Refugio Físico
                    </button>
                    <span class="tooltip">Si tienes un espacio equipado para el rescate y cuidado de perros.</span>
                </div>
                <div class="input-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion">
                    </div>


                <!-- Campos adicionales para refugio físico (inicialmente ocultos) -->
                <div class="extra-fields" id="campos_fisico" style="display: none;">
                   

                    <div class="input-group">
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad">
                    </div>

                    <div class="input-group">
                        <label for="capacidad">Capacidad (número de perros):</label>
                        <input type="number" id="capacidad" name="capacidad" min="1">
                    </div>

                    <div class="input-group">
                        <label for="horarios">Horarios de Atención:</label>
                        <input type="text" id="horarios" name="horarios">
                    </div>

                    <div class="input-group">
                        <label for="responsable">Nombre del Responsable:</label>
                        <input type="text" id="responsable" name="responsable">
                    </div>

                    <div class="input-group">
                        <label for="servicios">Servicios Ofrecidos:</label>
                        <textarea id="servicios" name="servicios" rows="3"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn-register">Registrarse</button>
            </form>
        </div>
    </iv>

    <script src="js/registro.blade.js"></script>
</body>
</html>