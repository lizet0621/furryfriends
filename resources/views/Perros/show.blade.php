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
        </table>
    @else
        <div class="alert alert-danger">No se encontró información del perros</div>
    @endisset
    
    <a href="{{ route('Perros.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection