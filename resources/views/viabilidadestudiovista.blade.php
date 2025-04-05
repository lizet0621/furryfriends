@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('cssone/viabilidadestudiovista.css') }}">
</head>

<div class="container">
    <!-- Botón para volver al inicio -->
    <form action="{{ url()->previous() }}">
    <button type="submit" class="btn btn-primary">⬅ Volver</button>
</form>

    <h1 class="page-title">Subir Viabilidad de Estudio</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('viabilidadestudiovista.subir') }}" method="POST" enctype="multipart/form-data" class="form-upload">
        @csrf
        <div class="form-group">
            <label for="archivo" class="label-input">Seleccionar Documento (PDF)</label>
            <input type="file" class="form-control" name="archivo" required>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn-upload">Subir</button>
        </div>
    </form>

    <hr>

    <h2 class="file-title">Buscar Viabilidad de Estudio</h2>

    <form method="GET" action="{{ route('viabilidadestudiovista.mostrar') }}" class="form-search">
        <div class="form-group">
            <label for="search" class="label-input">Buscar por Nombre de Documento</label>
            <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
        </div>
        <div class="btn-group">
            <button type="submit" class="btn-small">🔍 Buscar</button>
            <a href="{{ route('viabilidadestudiovista.mostrar') }}" class="btn-small">🧹 Limpiar</a>
        </div>
    </form>

    <hr>

    @if(isset($viabilidades) && $viabilidades->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Archivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viabilidades as $viabilidad)
                    <tr>
                        <td>{{ $viabilidad->id }}</td>
                        <td><a href="{{ asset('storage/' . $viabilidad->archivo) }}" target="_blank">{{ basename($viabilidad->archivo) }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron resultados.</p>
    @endif
</div>

@endsection