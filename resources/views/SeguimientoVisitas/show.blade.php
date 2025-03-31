@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Seguimiento de Visita</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $SeguimientoVisitas->id }}</td>
        </tr>
        <tr>
            <th>Adopción</th>
            <td>{{ $SeguimientoVisitas->adopcion->id }}</td>
        </tr>
        <tr>
            <th>Fecha de Visita</th>
            <td>{{ $SeguimientoVisitas->fecha_visita }}</td>
        </tr>
    </table>
    <a href="{{ route('SeguimientoVisitas.index') }}" class="btn btn-secondary">Volver</a>

</div>
@endsection