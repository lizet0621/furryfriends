@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <!-- Cabecera -->
    <header class="d-flex justify-content-between align-items-center p-3" style="background-color: #3498db; color: white; width: 100%; position: fixed; top: 0; left: 0; z-index: 1000;">
        <div class="d-flex align-items-center">
            <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
            <h1 style="margin: 0; font-size: 1.5rem;">Furry Friends</h1>
        </div>
        <form action="{{ url()->previous() }}">
    <button type="submit" class="btn btn-primary">⬅ Volver</button>
</form>
        </a>
    </header>

    
    <div class="container text-center animate_animated animate_fadeInUp" style="margin-top: 80px;"> <!-- Ajustar margen superior -->
        <link rel="stylesheet" href="{{ asset('cssone/admin.css') }}"> <!-- Enlazamos el CSS externo -->

        <h1>🐾 Bienvenido al <span class="text-primary">Sistema de Administracion</span> 🏡</h1>
        <p class="lead">Seleccione una de las siguientes opciones para comenzar:</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
        
            <a href="{{ route('Users.index') }}" class="btn btn-custom">
                🏠 usuarios
            </a>
            <a href="{{ route('Perros.index') }}" class="btn btn-custom">
                🐶 Perros
            </a>
            <a href="{{ route('SeguimientoVisitas.index') }}" class="btn btn-custom">
                📋 Seguimiento de Visitas
            </a>
            <a href="{{ route('ViabilidadEstudios.index') }}" class="btn btn-custom">
                📊 Viabilidad de Estudio
            </a>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Furry Friends | Todos los derechos reservados</p>
    </footer>
@endsection