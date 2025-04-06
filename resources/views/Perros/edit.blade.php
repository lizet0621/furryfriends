@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar perro</h2>

    <form action="{{ route('Perros.update', $perro->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $perro->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" name="edad" class="form-control" value="{{ $perro->edad }}" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen (opcional):</label>
            <input type="file" name="imagen" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="raza">Raza:</label>
            <input type="text" name="raza" class="form-control" value="{{ $perro->raza }}" required>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="color" class="form-control" value="{{ $perro->color }}" required>
        </div>

        <div class="form-group">
            <label for="tamano">Tamaño:</label>
            <input type="text" name="tamano" class="form-control" value="{{ $perro->tamano }}" required>
        </div>

        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select name="sexo" class="form-control" required>
                <option value="Macho" {{ $perro->sexo == 'Macho' ? 'selected' : '' }}>Macho</option>
                <option value="Hembra" {{ $perro->sexo == 'Hembra' ? 'selected' : '' }}>Hembra</option>
            </select>
        </div>

        <div class="form-group">
            <label for="historial_clinico">Historial Clínico:</label>
            <textarea name="historial_clinico" class="form-control" rows="3" required>{{ $perro->historial_clinico }}</textarea>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" rows="3" required>{{ $perro->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="disponible">¿Está disponible?</label>
            <select name="disponible" class="form-control" required>
                <option value="1" {{ $perro->disponible == 1 ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ $perro->disponible == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <input type="hidden" name="refugio_id" value="{{ $perro->refugio_id }}">

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
