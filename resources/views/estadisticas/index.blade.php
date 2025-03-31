<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📊 Estadísticas - Furry Friends</title>
    <link rel="stylesheet" href="{{ asset('cssone/estadisticas.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="dashboard">
    <!-- Menú lateral -->
    <nav class="side-menu" id="sideMenu">
        <h2>📊 Estadísticas</h2>
        <ul>
            <li><a href="#">📅 Año Actual</a></li>
            <li><a href="#">📅 Hoy</a></li>
            <li><a href="#">🔍 Filtros</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <div class="content">
        <h1 class="titulo-principal">📊 Estadísticas de Furry Friends</h1>

        <div class="stats-container">
            <div class="stat">
                <h3>🐶 Adoptantes</h3>
                <p>Año: {{ $data['adoptantes_ano'] }}</p>
                <p>Hoy: {{ $data['adoptantes_hoy'] }}</p>
            </div>
            <div class="stat">
                <h3>🏡 Refugios</h3>
                <p>Año: {{ $data['refugios_ano'] }}</p>
                <p>Hoy: {{ $data['refugios_hoy'] }}</p>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="charts">
            <canvas id="chartAno"></canvas>
            <canvas id="chartHoy"></canvas>
        </div>
    </div>
</div>

<script>
    var data = @json($data);
</script>
<script src="{{ asset('js/estadisticas.js') }}"></script>

</body>
</html>