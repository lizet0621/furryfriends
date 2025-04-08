@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestión de Perros</h1>
        <a href="{{ route('Perros.create') }}" class="btn btn-primary">Agregar perro</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabla -->
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">Listado de Perros</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Imagen</th>
                            <th>Raza</th>
                            <th>Color</th>
                            <th>Tamaño</th>
                            <th>Sexo</th>
                            <th>Historial Clínico</th>
                            <th>Descripción</th>
                            <th>Refugio</th>
                            <th>Disponible</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($perros as $perro)
                        <tr>
                            <td>{{ $perro->id }}</td>
                            <td>{{ $perro->nombre }}</td>
                            <td>{{ $perro->edad }} años</td>
                            <td>
                                @if($perro->imagenperro)
                                    <img src="{{ asset($perro->imagenperro) }}" alt="Imagen de {{ $perro->nombre }}" width="150" height="150">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" alt="Imagen no disponible" width="150" height="150">
                                @endif
                            </td>
                            <td>{{ $perro->raza }}</td>
                            <td>{{ $perro->color }}</td>
                            <td>{{ $perro->tamanio }}</td>
                            <td>{{ $perro->sexo }}</td>
                            <td>{{ $perro->historial_clinico ?? 'N/A' }}</td>
                            <td>{{ $perro->descripcion ?? 'N/A' }}</td>
                            <td>{{ $perro->role->nombre ?? 'Sin refugio' }}</td>
                            <td>
                                @if($perro->disponible)
                                    <span class="badge bg-success">Sí</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-1">
                                    <a href="{{ route('Perros.show', $perro->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye me-1"></i> Ver
                                    </a>
                                    <a href="{{ route('Perros.edit', $perro->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit me-1"></i> Editar
                                    </a>
                                    <form action="{{ route('Perros.destroy', $perro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de marcar como no disponible?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt me-1"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="text-center text-muted py-4">No hay perros registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
