<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perros;

class PerrosController extends Controller
{
    public function Create()
    {
        return view('registroperros');
    }

    public function Store(Request $request)
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

        $imagenPath = $request->file('imagen')->store('public/Perros');

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

        return redirect()->route('Perros.Create')->with('success', '🐕 ¡Perro registrado con éxito! 🎉');
    }
}