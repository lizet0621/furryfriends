@extends('layouts.app')

@section('title', 'Nueva Viabilidad')

@section('content')
<div class="container">
    <h1>Registrar Nueva Viabilidad</h1>

    <form action="{{ route('ViabilidadEstudios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="adoptante_id" class="form-label">Adoptante</label>
            <select name="adoptante_id" id="adoptante_id" class="form-control">
                @foreach($adoptantes as $adoptante)
                    <option value="{{ $adoptante->id }}">{{ $adoptante->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="refugio_id" class="form-label">Refugio</label>
            <select name="refugio_id" id="refugio_id" class="form-control">
                @foreach($refugios as $refugio)
                    <option value="{{ $refugio->id }}">{{ $refugio->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="archivo" class="form-label">Archivo</label>
            <input type="file" name="archivo" id="archivo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection