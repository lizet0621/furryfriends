@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Perro</h1>
    <form action="{{ route('Perros.update', $Perros->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $Perros->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" value="{{ $Perros->edad }}" required>
        </div>

        <div class="form-group">
            <label for="raza">Raza</label>
            <input type="text" class="form-control" id="raza" name="raza" value="{{ $Perros->raza }}">
        </div>

        <div class="form-group">
            <label for="tamanio">Tamaño</label>
            <select class="form-control" id="tamanio" name="tamanio" required>
                <option value="Pequeño" {{ $Perros->tamanio == 'Pequeño' ? 'selected' : '' }}>Pequeño</option>
                <option value="Mediano" {{ $Perros->tamanio == 'Mediano' ? 'selected' : '' }}>Mediano</option>
                <option value="Grande" {{ $Perros->tamanio == 'Grande' ? 'selected' : '' }}>Grande</option>
            </select>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $Perros->descripcion }}</textarea>
        </div>

        <!-- Cambio de Refugio a Rol -->
        <div class="form-group">
            <label for="rol_id">Rol</label>
            <select class="form-control" id="rol_id" name="rol_id" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $Perros->rol_id == $rol->id ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection