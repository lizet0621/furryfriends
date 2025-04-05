@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Perro</h1>
    <form action="{{ route('Perros.update', $Perros->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $Perros->nombre }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" name="edad" value="{{ $Perros->edad }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="raza">Raza</label>
            <input type="text" class="form-control" name="raza" value="{{ $Perros->raza }}">
        </div>

        <div class="form-group mb-3">
            <label for="color">Color</label>
            <input type="text" class="form-control" name="color" value="{{ $Perros->color }}">
        </div>

        <div class="form-group mb-3">
            <label for="tamanio">Tamaño</label>
            <select class="form-control" name="tamanio">
                <option value="Pequeño" {{ $Perros->tamanio == 'Pequeño' ? 'selected' : '' }}>Pequeño</option>
                <option value="Mediano" {{ $Perros->tamanio == 'Mediano' ? 'selected' : '' }}>Mediano</option>
                <option value="Grande" {{ $Perros->tamanio == 'Grande' ? 'selected' : '' }}>Grande</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="sexo">Sexo</label>
            <select class="form-control" name="sexo">
                <option value="Macho" {{ $Perros->sexo == 'Macho' ? 'selected' : '' }}>Macho</option>
                <option value="Hembra" {{ $Perros->sexo == 'Hembra' ? 'selected' : '' }}>Hembra</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="historial_clinico">Historial Clínico</label>
            <textarea class="form-control" name="historial_clinico">{{ $Perros->historial_clinico }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion">{{ $Perros->descripcion }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="imagenperro">Imagen actual</label><br>
            @if($Perros->imagenperro)
                <img src="{{ asset($Perros->imagenperro) }}" width="100" class="img-thumbnail mb-2">
            @else
                <p class="text-muted">Sin imagen</p>
            @endif
            <input type="file" class="form-control" name="imagenperro">
        </div>

        <div class="form-group mb-3">
            <label for="disponible">¿Disponible para adopción?</label>
            <select class="form-control" name="disponible">
                <option value="1" {{ $Perros->disponible ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$Perros->disponible ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <!-- Rol (Refugio) -->
        <div class="mb-3">
            <label for="id_rol" class="form-label">Rol</label>
            <select name="id_rol" class="form-control" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $User->id_rol == $rol->id ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('Perros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection