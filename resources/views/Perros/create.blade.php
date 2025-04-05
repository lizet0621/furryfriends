@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Registrar Perro</h1>
        </div>
        <div class="card-body">
            <form id="formPerros" action="{{ route('Perros.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <!-- Nombre -->
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <!-- Edad -->
                    <div class="col-md-6">
                        <label for="edad" class="form-label">Edad (años) *</label>
                        <input type="number" class="form-control" id="edad" name="edad" min="0" max="30" required>
                    </div>

                    <!-- Raza -->
                    <div class="col-md-6">
                        <label for="raza" class="form-label">Raza *</label>
                        <input type="text" class="form-control" id="raza" name="raza" required>
                    </div>

                    <!-- Color -->
                    <div class="col-md-6">
                        <label for="color" class="form-label">Color *</label>
                        <input type="text" class="form-control" id="color" name="color" required>
                    </div>

                    <!-- Tamaño -->
                    <div class="col-md-6">
                        <label for="tamanio" class="form-label">Tamaño *</label>
                        <select class="form-select" id="tamanio" name="tamanio" required>
                            <option disabled selected>Seleccione...</option>
                            <option value="Pequeño">Pequeño</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Grande">Grande</option>
                        </select>
                    </div>

                    <!-- Sexo -->
                    <div class="col-md-6">
                        <label for="sexo" class="form-label">Sexo *</label>
                        <select name="sexo" id="sexo" class="form-select" required>
                            <option disabled selected>Seleccione...</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </div>

                    <!-- Historial Clínico -->
                    <div class="col-12">
                        <label for="historial_clinico" class="form-label">Historial Clínico</label>
                        <textarea class="form-control" name="historial_clinico" id="historial_clinico" rows="2"></textarea>
                    </div>

                    <div class="col-md-6">
    <label for="imagen" class="form-label">Foto</label>
    <input type="file" class="form-control" id="imagen" name="imagen">
</div>

                    <!-- Descripción -->
                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>

                    <!-- Imagen -->
                    <!-- Imagen -->

                    <!-- Refugio -->
                    <div class="mb-3">
            <label for="id_rol" class="form-label">Rol</label>
            <select name="id_rol" class="form-control" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>


                    <!-- Disponible -->
                    <div class="col-md-6">
                        <div class="form-check mt-4 pt-2">
                            <input class="form-check-input" type="checkbox" id="disponible" name="disponible" value="1" checked>
                            <label class="form-check-label" for="disponible">Disponible para adopción</label>
                        </div>
                    </div>
                    

                    <!-- Botones -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <a href="{{ route('Perros.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection