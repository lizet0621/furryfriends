@extends('layouts.app')

@section('content')
<div class="container">
    @isset($Perros) <!-- Verificación aquí -->
        <h1>Detalles del Perro</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $Perros->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $Perros->nombre }}</td>
            </tr>
            <tr>
                <th>Raza</th>
                <td>{{ $Perros->raza }}</td>
            </tr>
            <tr>
                <th>Edad</th>
                <td>{{ $Perros->edad }}</td>
            </tr>
            <tr>
                <th>Tamaño</th>
                <td>{{ $Perros->tamanio }}</td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td>{{ $Perros->descripcion }}</td>
            </tr>
            <tr>
                <th>Rol</th> <!-- Cambio de Refugio a Rol -->
                <td>{{ $Perros->rol->nombre }}</td>
            </tr>
            <tr>
                <th>Disponible</th>
                <td>{{ $Perros->disponible ? 'Sí' : 'No' }}</td>
            </tr>
        </table>
    @else
        <div class="alert alert-danger">No se encontró información del perro</div>
    @endisset
    
    <a href="{{ route('Perros.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection