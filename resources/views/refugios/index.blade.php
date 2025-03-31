@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Refugios</h1>
    <a href="{{ route('refugios.create') }}" class="btn btn-primary mb-3">Agregar Refugio</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($refugios as $refugio)
                <tr>
                    <td>{{ $refugio->id }}</td>
                    <td>{{ $refugio->nombre }}</td>
                    <td>{{ $refugio->direccion }}</td>
                    <td>{{ $refugio->telefono }}</td>
                    <td>{{ $refugio->email }}</td>
                    <td>
                        <a href="{{ route('refugios.show', $refugio->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('refugios.edit', $refugio->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('refugios.destroy', $refugio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este refugio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection