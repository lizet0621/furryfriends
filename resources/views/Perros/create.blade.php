@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar nuevo perro</h2>

    <form action="{{ route('perros.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" name="edad" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="raza">Raza:</label>
            <input type="text" name="raza" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="color" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tamano">Tamaño:</label>
            <input type="text" name="tamano" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select name="sexo" class="form-control" required>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
        </div>

        <div class="form-group">
            <label for="historial_clinico">Historial Clínico:</label>
            <textarea name="historial_clinico" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="disponible">¿Está disponible?</label>
            <select name="disponible" class="form-control" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <input type="hidden" name="refugio_id" value="{{ Auth::user()->id }}">

        <button type="submit" class="btn btn-primary mt-3">Registrar</button>
    </form>
</div>
@endsection
