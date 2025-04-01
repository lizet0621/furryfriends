@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="container text-center animate_animated animate_fadeInUp">
    <link rel="stylesheet" href="{{ asset('cssone/admin.css') }}"> <!-- Enlazamos el CSS externo -->

        <h1>🐾 Bienvenido al <span class="text-primary">Sistema de Adopción</span> 🏡</h1>
        <p class="lead">Seleccione una de las siguientes opciones para comenzar:</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('adoptantes.index') }}" class="btn btn-custom">
                👨‍👩‍👧 Adoptantes
            </a>
            <a href="{{ route('refugios.index') }}" class="btn btn-custom">
                🏠 Refugios
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

    <!-- Botón de regresar al inicio -->
@endsection