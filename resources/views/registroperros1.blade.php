@extends('layouts.app')

@section('content')
<div class="container">
    <div class="logo-container" style="text-align: absolute;">
        <img src="{{ asset('imagenes/logo.jpg') }}" alt="logo" class="logo" style="width: 100px; height: auto;">
    </div>

    <form action="{{ url()->previous() }}">
        <button type="submit" class="btn btn-primary">⬅ Volver</button>
    </form>

    <h2 class="mb-4 text-center" style="color: #0056b3;">🐶 Furry Friends 🐶</h2>

    <div class="title text-center">
        <h1 style="color: #004080;">🐶 Registro de Perros 🐶</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">🎉 {{ session('success') }} 🎉</div>
    @endif

    <form action="{{ route('perros.store') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow-lg rounded" style="background: #e3f2fd;">
        @csrf

        <div class="mb-3">
            <label class="form-label">📛 Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">🎂 Edad</label>
            <input type="number" name="edad" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">📏 Tamaño</label>
            <select name="tamanio" class="form-control" required>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">🎨 Color</label>
            <input type="text" name="color" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">🩺 Historial Clínico</label>
            <textarea name="historial_clinico" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">⚥ Sexo</label>
            <select name="sexo" class="form-control" required>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">🏷 Raza</label>
            <input type="text" name="raza" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">🖼 Imagen</label>
            <input type="file" name="imagenperro" class="form-control" accept="image/*"required>
        </div>

        <div class="mb-3">
            <label class="form-label">📖 Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        {{-- CAMPO CORREGIDO --}}
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <div class="mb-3">
            <label class="form-label">📌 Disponible para adopción</label>
            <select name="disponible" class="form-control" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">🐾 Registrar Perro 🐾</button>
    </form>
</div>
@endsection
