<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="{{ asset('cssone/estadisticas.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <img src="{{ asset('imagenes/logo.jpg') }}" alt="Furry Friends Logo" class="logo">
            <h1>Furry Friends</h1>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-primary">Regresar al Inicio</a>
    </header>
    <div class="container">
        <h1>Estadísticas de Adopciones y Registros</h1>
        <p class="description">
            Aquí puedes visualizar las estadísticas de adopciones y registros de refugios por mes. 
            Los datos están representados en un gráfico interactivo para facilitar su análisis.
        </p>
        <div class="chart-container">
            <canvas id="estadisticasChart"></canvas>
        </div>
        <div id="adopcionesPorMes" style="display: none;">{{ json_encode($estadisticas['adopcionesPorMes']) }}</div>
        <div id="registrosRefugiosPorMes" style="display: none;">{{ json_encode($estadisticas['registrosRefugiosPorMes']) }}</div>
    </div>
    <footer>
        <p>&copy; 2024 Furry Friends - Todos los derechos reservados.</p>
    </footer>
    <script src="{{ asset('js/estadisticas.js') }}"></script>
</body>
</html>