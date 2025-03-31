@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container text-center">
    <h1>🐾 Bienvenido al <span class="text-primary">Sistema de Adopción</span> 🏡</h1>
    <p>Seleccione una de las siguientes opciones para comenzar:</p>
    <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="{{ route('adoptantes.index') }}" class="btn btn-primary rounded-pill shadow px-4 py-2">
            👨‍👩‍👧 Adoptantes
        </a>
        <a href="{{ route('refugios.index') }}" class="btn btn-success rounded-pill shadow px-4 py-2">
            🏠 Refugios
        </a>
        <a href="{{ route('Perros.index') }}" class="btn btn-warning rounded-pill shadow px-4 py-2">
            🐶 Perros
        </a>
        <a href="{{ route('SeguimientoVisitas.index') }}" class="btn btn-info rounded-pill shadow px-4 py-2">
            📋 Seguimiento de Visitas
        </a>
        <a href="{{ route('ViabilidadEstudios.index') }}" class="btn btn-orange rounded-pill shadow px-4 py-2">
            📊 Viabilidad de Estudio
        </a>
    </div>
</div>

<style>
    .btn-orange {
        background-color: #f4a261;
        color: white;
    }
    .btn-orange:hover {
        background-color: #e76f51;
        color: white;
    }
</style>
@endsection