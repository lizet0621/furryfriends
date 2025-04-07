@extends('layouts.register')

@section('content')
    <link rel="stylesheet" href="{{ asset('cssone/registro.css') }}">
    
    <style>
        #registro-adoptante-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        #registro-adoptante-container .titulo-registro {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
        }

        #registro-adoptante-container .tabs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        #registro-adoptante-container .tab {
            flex: 1;
            padding: 15px 10px;
            margin: 0 5px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-bottom: none;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-weight: 500;
            text-decoration: none;
            color: #555;
        }

        #registro-adoptante-container .tab.active {
            background-color: #4CAF50;
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            position: relative;
        }

        #registro-adoptante-container .tab.active:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            margin-left: -10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid #4CAF50;
        }

        #registro-adoptante-container .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-top: 4px solid #4CAF50;
        }

        #registro-adoptante-container form {
            display: flex;
            flex-direction: column;
        }

        #registro-adoptante-container label {
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: 500;
        }

        #registro-adoptante-container input {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        #registro-adoptante-container button[type="submit"] {
            margin-top: 25px;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        #registro-adoptante-container button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<a href="{{ url('/') }}" class="btn btn-secondary">🏠 volver a inicio</a>
    <div id="registro-adoptante-container">
        <div class="titulo-registro">Selecciona tu Rol</div>

        <div class="tabs">
            <a href="{{ route('register.adoptante') }}" class="tab active">Registro como Adoptante</a>
            <a href="{{ route('register.refugio') }}" class="tab">Registro como Refugio Físico</a>
            <a href="{{ route('register.natural') }}" class="tab">Registro como Persona Natural</a>
        </div>

        <div class="form-container">
            {{-- Mensajes de error --}}
            @if ($errors->any())
                <div style="background-color: #ffe0e0; color: #c00; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                    <strong>Se encontraron errores:</strong>
                    <ul style="margin: 5px 0 0 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Mensaje de éxito --}}
            @if (session('success'))
                <div style="background-color: #e0ffe0; color: #008000; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <input type="hidden" name="id_rol" value="1">

                <label>Nombre Completo:</label>
                <input type="text" name="name" value="{{ old('name') }}" required>

                <label>Correo Electrónico:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>

                <label>Teléfono:</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}">

                <label>Dirección:</label>
                <input type="text" name="direccion" value="{{ old('direccion') }}" required>

                <label>Contraseña:</label>
                <input type="password" name="password" required>

                <label>Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" required>

                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>
@endsection
