<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perros;

class PerrosController extends Controller
{
    // Método para listar todos los perros disponibles
    public function index()
    {
        $perros = Perros::all();
        return view('Perros.index', compact('Perros')); // Uso correcto con la carpeta en mayúscula
    }

    // Método para mostrar el formulario de registro
    public function create()
    {
        return view('Perros.create'); // Asegura que el archivo exista en resources/views/Perros/
    }

    // Método para almacenar un nuevo perro en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'raza' => 'required',
            'color' => 'required',
            'tamaño' => 'required',
            'sexo' => 'required',
            'historial_clinico' => 'required',
            'descripcion' => 'required',
            'refugio' => 'required',
            'disponibilidad' => 'required',
        ]);

        // Guardar la imagen en storage/app/public/Perros
        $imagenPath = $request->file('imagen')->store('public/Perros');

        // Crear el registro en la base de datos
        Perros::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'imagenperro' => str_replace('public/', '', $imagenPath),
            'raza' => $request->raza,
            'color' => $request->color,
            'tamanio' => $request->tamaño,
            'sexo' => $request->sexo,
            'historial_clinico' => $request->historial_clinico,
            'descripcion' => $request->descripcion,
            'refugio_id' => $request->refugio,
            'disponible' => $request->disponibilidad,
            'fecha_adopcion' => $request->fecha_adopcion,
        ]);

        return redirect()->route('Perros.create')->with('success', '🐕 ¡Perro registrado con éxito! 🎉');
    }
}
