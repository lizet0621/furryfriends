@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $perro->nombre }}</h1>
    <p><strong>Edad:</strong> {{ $perro->edad }} años</p>
    <p><strong>Raza:</strong> {{ $perro->raza }}</p>
    <p><strong>Tamaño:</strong> {{ $perro->tamanio }}</p>
    <p><strong>Refugio:</strong> {{ $perro->refugio->nombre ?? 'Sin refugio' }}</p>
    <p><strong>Estado:</strong> {{ $perro->disponible == 'si' ? 'Disponible' : 'Adoptado' }}</p>
    <a href="{{ route('Perros.index') }}" class="btn btn-primary">Volver al listado</a>
</div>
@endsection
