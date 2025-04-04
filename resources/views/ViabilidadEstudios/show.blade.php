@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Viabilidad del Estudio</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $ViabilidadEstudios->id }}</td>
        </tr>
        <tr>
            <th>Adoptante</th>
            <td>{{ $ViabilidadEstudios->adoptante->nombre }}</td>
        </tr>
        <tr>
            <th>Resultado</th>
            <td>{{ $ViabilidadEstudios->resultado }}</td>
        </tr>
        <tr>
            <th>Observaciones</th>
            <td>{{ $ViabilidadEstudios->observaciones }}</td>
        </tr>
    </table>
    <a href="{{ route('ViabilidadEstudios.index') }}" class="btn btn-secondary">Volver</a>
</div>

@endsection