@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar perro</h1>
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
        <div class="form-group">
            <label for="refugio_id">Refugio</label>
            <select class="form-control" id="refugio_id" name="refugio_id" required>
                @foreach($refugios as $refugio)
                    <option value="{{ $refugio->id }}" {{ $Perros->refugio_id == $refugio->id ? 'selected' : '' }}>
                        {{ $refugio->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection