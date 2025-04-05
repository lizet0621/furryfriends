@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear nuevo usuario</h2>

    <form action="{{ route('Users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
        </div>

        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad') }}">
        </div>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad</label>
            <input type="number" name="capacidad" class="form-control" value="{{ old('capacidad') }}">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horarios</label>
            <input type="text" name="horarios" class="form-control" value="{{ old('horarios') }}">
        </div>

        <div class="mb-3">
            <label for="responsable" class="form-label">Responsable</label>
            <input type="text" name="responsable" class="form-control" value="{{ old('responsable') }}">
        </div>

        <div class="mb-3">
            <label for="servicios" class="form-label">Servicios</label>
            <input type="text" name="servicios" class="form-control" value="{{ old('servicios') }}">
        </div>

        <div class="mb-3">
            <label for="id_rol" class="form-label">Rol</label>
            <select name="id_rol" class="form-control" required>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection