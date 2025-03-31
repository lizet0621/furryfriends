@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Adoptante</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $adoptante->id }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $adoptante->nombre }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $adoptante->email }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $adoptante->telefono }}</td>
        </tr>
    </table>
    <a href="{{ route('adoptante.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection