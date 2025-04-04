@extends('layouts.app')

@section('content')
<div class="container">
    
    <!-- 🏠 Botón de regreso a inicio -->
    <a class="boton-inicio" type="button">
        <a href="{{ url('/') }}">Inicio</a>
    </i> 
    </a>

    <h2 class="text-center mb-4">
        <img src="{{ asset('imagenes/logo.jpg') }}" alt="logo" class="logo" style="width: 100px; height: auto;">
        Buscar Perros
    </h2>

    <link rel="stylesheet" href="{{ asset('cssone/perrosdisponibles.css')}}">

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('perrosdisponibles') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" value="{{ request('edad') }}" placeholder="Ingrese la edad">
            </div>
            <div class="col-md-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" id="color" class="form-control" value="{{ request('color') }}" placeholder="Ingrese el color">
            </div>
            <div class="col-md-3">
                <label for="tamanio" class="form-label">Tamaño</label>
                <input type="text" name="tamanio" id="tamanio" class="form-control" value="{{ request('tamanio') }}" placeholder="Ingrese el tamaño">
            </div>
            <div class="col-md-3">
                <label for="caracteristica" class="form-label">Otra Característica</label>
                <input type="text" name="caracteristica" id="caracteristica" class="form-control" value="{{ request('caracteristica') }}" placeholder="Ingrese otra característica">
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <p class="text-muted text-center mb-4">Total de perros disponibles: {{ $perros->count() }}</p>

    @if($perros->isEmpty())
        <div class="alert alert-warning">No hay perros disponibles actualmente.</div>
    @else
        <div class="row">
            @foreach($perros as $perro)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($perro->imagenperro)
                            <img src="{{ asset('storage/' . $perro->imagenperro) }}" class="card-img-top" alt="Imagen de {{ $perro->nombre }}">
                        @else
                            <img src="{{ asset('images/default-dog.jpg') }}" class="card-img-top" alt="Imagen no disponible">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $perro->nombre }}</h5>
                            <p class="card-text">
                                <strong>Raza:</strong> {{ $perro->raza ?? 'Desconocida' }}<br>
                                <strong>Edad:</strong> {{ $perro->edad ?? 'No especificada' }} años<br>
                                <strong>Color:</strong> {{ $perro->color ?? 'No especificado' }}<br>
                                <strong>Tamaño:</strong> {{ $perro->tamanio ?? 'No especificado' }}<br>
                                <strong>Características:</strong> {{ $perro->caracteristica ?? 'No especificadas' }}<br>
                                <strong>Refugio:</strong> {{ optional($perro->refugio)->nombre ?? 'Sin refugio' }}
                            </p>
                            <p class="card-text">{{ $perro->descripcion ?? 'Sin descripción' }}</p>
                        </div>

                        <div class="card-footer">
                            <form action="{{ route('solicitud.adopcion') }}" method="POST">
                                @csrf
                                <input type="hidden" name="perro_id" value="{{ $perro->id }}">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-paw"></i> Solicitar Adopción
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection