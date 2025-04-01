@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg p-4 border-0 rounded-3">
        <h1 class="text-center text-primary fw-bold">🐾 Adoptantes 🐾</h1>
        <div class="text-center mb-3">
            <a href="{{ route('adoptantes.create') }}" class="btn btn-info btn-lg text-white shadow-sm">➕ Agregar Adoptante</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover border rounded-3 overflow-hidden">
                <thead class="table-info text-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Chats Activos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center align-middle">
                    @foreach ($adoptantes as $adoptante)
                    <tr>
                        <td class="fw-bold">{{ $adoptante->id }}</td>
                        <td>{{ $adoptante->nombre }}</td>
                        <td>{{ $adoptante->email }}</td>
                        <td>{{ $adoptante->telefono }}</td>
                        <td>{{ $adoptante->direccion }}</td>
                        <td>
                        <td>
                            <a href="{{ route('adoptantes.edit', $adoptante->id) }}" class="btn btn-warning btn-sm text-dark shadow-sm">✏ Editar</a>
                            <form action="{{ route('adoptantes.destroy', $adoptante->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('¿Eliminar este adoptante?')">🗑 Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection