@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Refugio</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $refugio->id }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $refugio->nombre }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $refugio->direccion }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $refugio->telefono }}</td>
        </tr>
    </table>
    <a href="{{ route('refugio.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection