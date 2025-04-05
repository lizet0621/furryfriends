@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del usuario</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $user->telefono }}</li>
        <li class="list-group-item"><strong>Dirección:</strong> {{ $user->direccion }}</li>
        <li class="list-group-item"><strong>Ciudad:</strong> {{ $user->ciudad }}</li>
        <li class="list-group-item"><strong>Capacidad:</strong> {{ $user->capacidad }}</li>
        <li class="list-group-item"><strong>Horarios:</strong> {{ $user->horarios }}</li>
        <li class="list-group-item"><strong>Responsable:</strong> {{ $user->responsable }}</li>
        <li class="list-group-item"><strong>Servicios:</strong> {{ $user->servicios }}</li>
        <li class="list-group-item"><strong>Rol:</strong> {{ $user->role->nombre ?? 'Sin rol asignado' }}</li>
    </ul>

    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
@endsection