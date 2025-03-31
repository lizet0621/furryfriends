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
                        <label for="refugio_id" class="form-label">Refugio *</label>
                        <select name="refugio_id" id="refugio_id" class="form-select" required>
                            <option value="">Seleccione un refugio</option>
                            @foreach($refugios as $refugio)
                                <option value="{{ $refugio->id }}">{{ $refugio->nombre }}</option>
                            @endforeach
                        </select>
                        @error('refugio_id')
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
                            <th width="5%">ID</th>
                            <th>Nombre</th>
                            <th width="8%">Edad</th>
                            <th>Raza</th>
                            <th width="10%">Tamaño</th>
                            <th>Refugio</th>
                            <th width="12%">Estado</th>
                            <th width="15%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Perros as $Perros)
                        <tr>
                            <td>{{ $Perros->id }}</td>
                            <td>{{ $Perros->nombre }}</td>
                            <td>{{ $Perros->edad }} años</td>
                            <td>{{ $Perros->raza }}</td>
                            <td>
                                <span class="badge 
                                    @if($Perros->tamanio == 'Pequeño') bg-info
                                    @elseif($Perros->tamanio == 'Mediano') bg-primary
                                    @else bg-secondary
                                    @endif">
                                    {{ $Perros->tamanio }}
                                </span>
                            </td>
                            <td>{{ $Perros->refugio->nombre }}</td>
                            <td>
                                @if($Perros->disponible)
                                    <span class="badge bg-success">Disponible</span>
                                @else
                                    <span class="badge bg-danger">Adoptado</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('Perros.edit', $Perros->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('Perros.destroy', $Perros->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este perro?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('Perros.show', $Perros->id) }}" class="btn btn-sm btn-info" title="Ver detalles">
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
            @if($Perros->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Mostrando {{ $Perros->firstItem() }} a {{ $Perros->lastItem() }} de {{ $Perros->total() }} registros
                </div>
                <nav>
                    {{ $Perros->links() }}
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mostrar/ocultar formulario
        const toggleForm = document.getElementById('toggleForm');
        const formContainer = document.getElementById('formContainer');
        const cancelForm = document.getElementById('cancelForm');
        
        toggleForm.addEventListener('click', function() {
            formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
        });
        
        cancelForm.addEventListener('click', function() {
            formContainer.style.display = 'none';
            document.getElementById('PerrosForm').reset();
        });

        // Mostrar formulario si hay errores de validación
        @if($errors->any())
            formContainer.style.display = 'block';
        @endif

        // Búsqueda en la tabla
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('tbody tr');
        
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(searchTerm) ? '' : 'none';
            });
        });
    });
</script>
@endsection