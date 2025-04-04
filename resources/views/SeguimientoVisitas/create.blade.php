@extends('layouts.app')

@section('title', 'Subir Seguimiento')
@section('content')
<div class="container">
    <h1>Subir Archivo de Seguimiento</h1>

    <form action="{{ route('SeguimientoVisitas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="adoptante_id" class="form-label">ID Adoptante</label>
            <input type="number" name="adoptante_id" id="adoptante_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="archivo" class="form-label">Archivo</label>
            <input type="file" name="archivo" id="archivo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir</button>
    </form>
</div>
@endsection