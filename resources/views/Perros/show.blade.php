@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Perro</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $Perros->id }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $Perros->nombre }}</td>
        </tr>
        <tr>
            <th>Edad</th>
            <td>{{ $Perros->edad }} años</td>
        </tr>
        <tr>
            <th>Raza</th>
            <td>{{ $Perros->raza }}</td>
        </tr>
        <tr>
            <th>Color</th>
            <td>{{ $Perros->color }}</td>
        </tr>
        <tr>
            <th>Tamaño</th>
            <td>{{ $Perros->tamanio }}</td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td>{{ $Perros->sexo }}</td>
        </tr>
        <tr>
            <th>Historial Clínico</th>
            <td>{{ $Perros->historial_clinico ?? 'No registrado' }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $Perros->descripcion ?? 'No registrada' }}</td>
        </tr>
        <tr>
            <th>Imagen</th>
            <td>
                @if($Perros->imagenperro)
                    <img src="{{ asset($Perros->imagenperro) }}" width="150" class="img-thumbnail">
                @else
                    <span class="text-muted">Sin imagen</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Refugio</th>
            <td>{{ $Perros->rol->nombre ?? 'Sin asignar' }}</td>
        </tr>
        <tr>
            <th>Disponible</th>
            <td>{{ $Perros->disponible ? 'Sí' : 'No' }}</td>
        </tr>
    </table>

    <a href="{{ route('Perros.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection