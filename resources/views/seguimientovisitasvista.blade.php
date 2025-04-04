@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('cssone/seguimientovisitasvista.css') }}">
</head>

<div class="top-bar">
    <a href="{{ route('welcome') }}" class="btn-back">← Volver al inicio</a>
    <div class="logo-container">
        <img src="{{ asset('imagenes/logo.jpg') }}" alt="logo" class="logo" style="width: 100px; height: auto;">
    </div>
</div>

<div class="container">
    <h1 class="page-title">Subir Seguimiento de Visitas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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

    <form action="{{ route('seguimientovisitasvista.subir') }}" method="POST" enctype="multipart/form-data" class="form-upload">
        @csrf
        @if(auth()->check())
            <input type="hidden" name="role_id" value="{{ auth()->user()->id_rol }}">
        @endif

        <div class="mb-3">
            <label for="archivos" class="label-input">Seleccionar Documento (PDF, JPG, PNG)</label>
            <input type="file" class="form-control" name="archivos[]" multiple required>
        </div>

        <button type="submit" class="btn btn-upload">Subir Documento</button>
    </form>

    <hr>

    <h2 class="file-title">Buscar Documentos</h2>
    <form method="GET" action="{{ route('seguimientovisitasvista.mostrar') }}" class="form-search">
        <div class="form-group">
            <label for="search" class="label-input">Buscar por nombre de archivo</label>
            <input type="text" class="form-control" name="search" placeholder="Ej: informe">
        </div>
        <button type="submit" class="btn btn-search">Buscar</button>
    </form>

    <hr>

    <h2 class="file-title">Documentos de Seguimiento de Visitas</h2>

    @if(isset($seguimientos) && $seguimientos->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Archivo</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seguimientos as $seguimiento)
                    <tr>
                        <td>{{ $seguimiento->id }}</td>
                        <td><a href="{{ asset('storage/' . $seguimiento->archivo) }}" target="_blank">{{ basename($seguimiento->archivo) }}</a></td>
                        <td>{{ $seguimiento->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $seguimiento->archivo) }}" download class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i> Descargar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron documentos.</p>
    @endif
</div>

@endsection