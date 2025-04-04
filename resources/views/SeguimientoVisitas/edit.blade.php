@extends('layouts.app')
@section('title', 'Editar Seguimiento de Visita')
@section('content')
<div class="container">
    <h1>Editar Seguimiento de Visita</h1>
    <form action="{{ route('SeguimientoVisitas.update', $seguimiento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fecha_visita">Fecha de Visita</label>
            <input type="date" class="form-control" id="fecha_visita" name="fecha_visita" value="{{ $seguimiento->fecha_visita }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection