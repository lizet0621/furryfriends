@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('cssone/seguimientovisitasvista.css') }}">
</head>

<a href="/" onclick="event.preventDefault(); window.history.length > 1 ? history.back() : window.location='/'" class="btn btn-primary">⬅ Volver</a>

<div class="container">
    <h1 class="page-title">Subir Viabilidad de Estudios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('viabilidadestudiovista.subir') }}" method="POST" enctype="multipart/form-data" class="form-upload">
        @csrf
        <div class="form-group">
            <label for="archivos" class="label-input">Seleccionar Archivos</label>
            <input type="file" class="form-control" name="archivos[]" multiple required>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn-upload">Subir Archivos</button>
        </div>
    </form>

    <hr>

    <h2 class="file-title">Buscar Viabilidades</h2>

    <form method="GET" action="{{ route('viabilidadestudiovista.mostrar') }}" class="form-search">
        <div class="form-group">
            <label for="archivo" class="label-input">Nombre del archivo</label>
            <input type="text" class="form-control" name="archivo" value="{{ request('archivo') }}">
        </div>

        <div class="btn-container">
            <button type="submit" class="btn-search">🔍 Buscar</button>
            <a href="{{ route('viabilidadestudiovista.mostrar') }}" class="btn-clear">🧹 Limpiar</a>
        </div>
    </form>

    <hr>

    @if(isset($viabilidades) && $viabilidades->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Archivo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viabilidades as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ asset('storage/' . $item->archivo) }}" target="_blank">{{ $item->nombre_original }}</a></td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No se encontraron resultados.</p>
    @endif
</div>

@endsection