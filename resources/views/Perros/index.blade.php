@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestión de Perros</h1>
        <button id="toggleForm" class="btn btn-primary">
            <a href="{{ route('Perros.create') }}" class="btn btn-primary mb-4">Agregar perro</a>
        </button>
    </div>

    <!-- Formulario de registro (inicialmente oculto) -->
    <div id="formContainer" class="card mb-4" style="display: none;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Registrar Nuevo Perro</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('Perros.store') }}" method="POST" id="perrosForm">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                        @error('nombre')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="edad" class="form-label">Edad (años) *</label>
                        <input type="number" name="edad" id="edad" class="form-control" min="0" max="30" required>
                        @error('edad')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="raza" class="form-label">Raza *</label>
                        <input type="text" name="raza" id="raza" class="form-control" required>
                        @error('raza')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tamanio" class="form-label">Tamaño *</label>
                        <select name="tamanio" id="tamanio" class="form-select" required>
                            <option value="">Seleccione...</option>
                            <option value="Pequeño">Pequeño</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Grande">Grande</option>
                        </select>
                        @error('tamanio')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="rol_id" class="form-label">Rol *</label>
                        <select name="rol_id" id="rol_id" class="form-select" required>
                            <option value="">Seleccione un rol</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                            @endforeach
                        </select>
                        @error('rol_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estado</label>
                        <div class="form-check form-switch mt-2">
                            <input type="checkbox" name="disponible" id="disponible" class="form-check-input" checked value="1">
                            <label for="disponible" class="form-check-label">Disponible para adopción</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-2">
                        <button type="button" id="cancelForm" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Guardar Perro
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Mensajes de sesión -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> Corrige los errores en el formulario.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabla de perros -->
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
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Perros as $Perro)
                        <tr>
                            <td>{{ $Perro->id }}</td>
                            <td>{{ $Perro->nombre }}</td>
                            <td>{{ $Perro->edad }} años</td>
                            <td>{{ $Perro->raza }}</td>
                            <td>{{ $Perro->tamanio }}</td>
                            <td>{{ $Perro->rol->nombre }}</td>
                            <td>
                                @if($Perro->disponible)
                                    <span class="badge bg-success">Disponible</span>
                                @else
                                    <span class="badge bg-danger">Adoptado</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('Perros.edit', $Perro->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('Perros.destroy', $Perro->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este perro?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('Perros.show', $Perro->id) }}" class="btn btn-sm btn-info" title="Ver detalles">
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
        </div>
    </div>
</div>
@endsection