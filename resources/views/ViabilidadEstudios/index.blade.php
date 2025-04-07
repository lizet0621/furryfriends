@extends('layouts.app')

@section('title', 'Viabilidad de Estudio')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">
            <i class="fas fa-check-circle"></i> Viabilidad de Estudio
            <span class="text-warning">📋</span>
        </h1>
        <a href="{{ route('ViabilidadEstudios.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Nueva Viabilidad 🏡
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <h5 class="mb-0">
                <i class="fas fa-clipboard-list"></i> Lista de Viabilidades
                <span class="ms-2">📋🐾</span>
            </h5>
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-warning">
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-user"></i> Adoptante</th>
                            <th><i class="fas fa-home"></i> Refugio</th>
                            <th><i class="fas fa-file-alt"></i> Archivo</th>
                            <th><i class="fas fa-cogs"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($viabilidades as $viabilidad)
                        <tr>
                            <td class="fw-bold text-primary">{{ $viabilidad->id }}</td>
                            <td class="text-dark">🐶 {{ optional($viabilidad->adoptante)->nombre ?? 'Sin asignar' }}</td>
                            <td class="text-dark">🏡 {{ optional($viabilidad->refugio)->nombre ?? 'Sin asignar' }}</td>
                            <td>
                                @if (!empty($viabilidad->archivo))
                                    <a href="{{ asset('storage/' . $viabilidad->archivo) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-eye"></i> Ver Archivo 📄
                                    </a>
                                @else
                                    <span class="text-muted">Sin archivo</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('ViabilidadEstudios.destroy', $viabilidad->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta viabilidad?')">
                                        <i class="fas fa-trash-alt"></i> Eliminar 🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($viabilidades->isEmpty())
                    <p class="text-center mt-3 text-muted">No hay registros disponibles.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection