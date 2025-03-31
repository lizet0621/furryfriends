@extends('layouts.app')

@section('title', 'Editar Viabilidad de Estudio')

@section('content')
<div class="container">
    <h1>Editar Viabilidad de Estudio</h1>
    <form action="{{ route('ViabilidadEstudios.update', $viabilidad->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="adoptante_id">Adoptante</label>
            <select class="form-control" id="adoptante_id" name="adoptante_id" required>
                @foreach($adoptantes as $adoptante)
                    <option value="{{ $adoptante->id }}" {{ $adoptante->id == $viabilidad->adoptante_id ? 'selected' : '' }}>{{ $adoptante->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="resultado">Resultado</label>
            <input type="text" class="form-control" id="resultado" name="resultado" value="{{ $viabilidad->resultado }}" required>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" required>{{ $viabilidad->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection