@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestión de Perros</h1>
        <a href="{{ route('Perros.create') }}" class="btn btn-primary mb-4">Agregar perro</a>
    </div>
    <a href="{{ route('Perros.show', $perros->id) }}" class="btn btn-sm btn-info">
    <i class="fas fa-eye"></i> Ver detalles
</a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Listado de Perros</h5>
                <div class="input-group" style="width: 300px;">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar perros...">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Raza</th>
                            <th>Tamaño</th>
                            <th>Refugio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($perros as $perro)
                        <tr>
                            <td>{{ $perro->id }}</td>
                            <td>{{ $perro->nombre }}</td>
                            <td>{{ $perro->edad }} años</td>
                            <td>{{ $perro->raza }}</td>
                            <td>
                                <span class="badge 
                                    @if($perro->tamanio == 'Pequeño') bg-info
                                    @elseif($perro->tamanio == 'Mediano') bg-primary
                                    @else bg-secondary
                                    @endif">
                                    {{ $perro->tamanio }}
                                </span>
                            </td>
                            <td>{{ $perro->refugio->nombre ?? 'Sin refugio' }}</td>
                            <td>
                                @if($perro->disponible == 'si')
                                    <span class="badge bg-success">Disponible</span>
                                @else
                                    <span class="badge bg-danger">Adoptado</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('Perros.edit', $perro->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('Perros.destroy', $perro->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('Perros.show', $perro->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No hay perros registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Paginación -->
            {{ $perros->links() }}
        </div>
    </div>
</div>
@endsection
