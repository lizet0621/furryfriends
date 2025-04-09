@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Perro</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $perro->id }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $perro->nombre }}</td>
        </tr>
        <tr>
            <th>Edad</th>
            <td>{{ $perro->edad }} años</td>
        </tr>
        <tr>
            <th>Raza</th>
            <td>{{ $perro->raza }}</td>
        </tr>
        <tr>
            <th>Color</th>
            <td>{{ $perro->color }}</td>
        </tr>
        <tr>
            <th>Tamaño</th>
            <td>{{ $perro->tamanio }}</td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td>{{ $perro->sexo }}</td>
        </tr>
        <tr>
            <th>Historial Clínico</th>
            <td>{{ $perro->historial_clinico ?? 'No registrado' }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $perro->descripcion ?? 'No registrada' }}</td>
        </tr>
        <tr>
            <th>Imagen</th>
            <td>
                @if($perro->imagenperro)
                    <img src="{{ asset($perro->imagenperro) }}" width="150" class="img-thumbnail">
                @else
                    <span class="text-muted">Sin imagen</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Refugio</th>
            <td>{{ $perro->rol->nombre ?? 'Sin asignar' }}</td>
        </tr>
        <tr>
            <th>Disponible</th>
            <td>{{ $perro->disponible ? 'Sí' : 'No' }}</td>
        </tr>
    </table>

    <a href="{{ route('Perros.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection