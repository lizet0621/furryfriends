<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perros; // Nombre correcto del modelo en plural
use App\Models\Refugio;

class PerrosController extends Controller
{
    public function index() {
    // Obtener todos los perros con su refugio relacionado
    $perros = Perros::with('refugio')->paginate(10); 

    // Pasar los datos de los perros a la vista
    return view('Perros.index', compact('perros'));
}
    public function show($id)
    {
        // Obtener el perro con su relación de refugio
        $perro = Perros::with('refugio')->findOrFail($id);
    
        // Retornar la vista con el perro
        return view('Perros.show', compact('perro'));
    }
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'raza' => 'required',
            'color' => 'required',
            'tamanio' => 'required',
            'sexo' => 'required',
            'historial_clinico' => 'required',
            'descripcion' => 'required',
            'refugio' => 'required|exists:refugios,id',
            'disponibilidad' => 'nullable',
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/Perros');
            $imagenNombre = str_replace('public/', '', $imagenPath);
        } else {
            return redirect()->back()->withErrors(['imagen' => 'Error al subir la imagen.']);
        }

        Perros::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'imagenperro' => $imagenNombre,
            'raza' => $request->raza,
            'color' => $request->color,
            'tamanio' => $request->tamanio,
            'sexo' => $request->sexo,
            'historial_clinico' => $request->historial_clinico,
            'descripcion' => $request->descripcion,
            'refugio_id' => $request->refugio,
            'disponible' => $request->disponibilidad === 'si' ? 'si' : 'no',
            'fecha_adopcion' => $request->fecha_adopcion,
        ]);

        return redirect()->route('Perros.index')->with('success', '🐕 ¡Perro registrado con éxito! 🎉');
    }
}
