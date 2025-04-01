@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('cssone/seguimientovisitasvista.css') }}">
</head>

<div class="container">
    <h1 class="page-title">Subir Seguimiento de Visitas</h1>

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

    <form action="{{ route('seguimientovisitasvista.subir') }}" method="POST" enctype="multipart/form-data" class="form-upload">
        @csrf
        <div class="form-group">
            <label for="archivo" class="label-input">Seleccionar Documento (PDF)</label>
            <input type="file" class="form-control" name="archivo" required>
        </div>
        <button type="submit" class="btn btn-upload">Subir Documento</button>
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
                </tr>
            </thead>
            <tbody>
                @foreach($seguimientos as $seguimiento)
                    <tr>
                        <td>{{ $seguimiento->id }}</td>
                        <td><a href="{{ asset('storage/' . $seguimiento->archivo) }}" target="_blank">Ver PDF</a></td>
                        <td>{{ $seguimiento->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron documentos.</p>
    @endif
</div>

@endsection