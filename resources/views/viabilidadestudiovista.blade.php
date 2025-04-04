@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('cssone/viabilidadestudiovista.css') }}">
</head>

<div class="container">
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
        <button type="submit" class="btn btn-upload">Subir Documento</button>
    </form>

    <hr>

    <h2 class="file-title">Buscar Viabilidad de Estudio</h2>
    
    <!-- Filtro de búsqueda -->
    <form method="GET" action="{{ route('viabilidadestudiovista.mostrar') }}" class="form-search">
        <div class="form-group">
            <label for="search" class="label-input">Buscar por Nombre de Documento</label>
            <input type="text" class="form-control" name="search" placeholder="Buscar...">
        </div>
        <button type="submit" class="btn btn-search">Buscar</button>
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
                @foreach($viabilidades as $viabilidad)
                    <tr>
                        <td>{{ $viabilidad->id }}</td>
                        <td><a href="{{ asset('storage/' . $viabilidad->archivo) }}" target="_blank">Ver PDF</a></td>
                        <td>{{ $viabilidad->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron resultados.</p>
    @endif
</div>
@endsection