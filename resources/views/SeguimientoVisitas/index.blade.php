@extends('layouts.app')

@section('title', 'Seguimiento de Visitas')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">
            <i class="fas fa-clipboard-list"></i> Seguimiento de Visitas
            <span class="text-warning">🐾</span>
        </h1>
        <a href="{{ route('SeguimientoVisitas.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Nuevo Seguimiento
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <h5 class="mb-0">
                <i class="fas fa-dog"></i> Lista de Seguimientos
                <span class="ms-2">🐾</span>
            </h5>
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-user"></i> Adoptante</th>
                            <th><i class="fas fa-file-alt"></i> Archivo</th>
                            <th><i class="fas fa-cogs"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seguimientos as $seguimiento)
                        <tr>
                            <td>{{ $seguimiento->id }}</td>
                            <td>{{ $seguimiento->adoptante->nombre }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $seguimiento->archivo) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-eye"></i> Ver Archivo 🐾
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('SeguimientoVisitas.destroy', $seguimiento->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este seguimiento?')">
                                        <i class="fas fa-trash-alt"></i> Eliminar 🐾
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection