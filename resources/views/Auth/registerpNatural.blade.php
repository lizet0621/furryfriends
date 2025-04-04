@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registro</h2>
    <link rel="stylesheet" href="{{ asset('cssone/registro.css') }}">
    <form action="{{ route('register.post') }}" method="POST">
    @csrf
    <label>Nombre Completo:</label><input type="text" name="name" required>
    <label>Correo Electrónico:</label><input type="email" name="email" required>
    <label>Teléfono:</label><input type="text" name="telefono">
    <label>Dirección:</label><input type="text" name="direccion" required>
    <label>Ciudad:</label><input type="text" name="ciudad">
    <label>Capacidad:</label><input type="number" name="capacidad">
    <label>Horarios de Atención:</label><input type="text" name="horarios">
    <label>Responsable:</label><input type="text" name="responsable">
    <label>Servicios:</label><textarea name="servicios"></textarea>
    <label>Contraseña:</label><input type="password" name="password" required>
    <label>Confirmar Contraseña:</label><input type="password" name="password_confirmation" required>
    <button type="submit">Registrar</button>
</form>


</div>
@endsection