<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perros;
use Illuminate\Support\Facades\Storage;

class PerrosDisponiblesController extends Controller
{
    // Método para mostrar los perros disponibles con filtro y paginación
    public function mostrar(Request $request)
    {
        $query = Perros::disponibles();

        if ($request->filled('edad')) {
            $query->where('edad', $request->edad);
        }

        if ($request->filled('color')) {
            $query->where('color', 'like', '%' . $request->color . '%');
        }

        if ($request->filled('tamanio')) {
            $query->where('tamanio', 'like', '%' . $request->tamanio . '%');
        }

        if ($request->filled('descripcion')) {
            $query->where('descripcion', 'like', '%' . $request->descripcion . '%');
        }

        // Paginar y mantener los filtros en la URL
        $perros = $query->paginate(6)->appends($request->all());

        return view('perrosdisponibles', compact('perros'));
    }

    // Método para almacenar un nuevo perro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'             => 'required',
            'edad'               => 'required|integer',
            'imagenperro'        => 'nullable|image',
            'tamanio'            => 'required',
            'color'              => 'required',
            'historial_clinico'  => 'required',
            'sexo'               => 'required',
            'raza'               => 'required',
            'descripcion'        => 'required',
            'disponible'         => 'required|boolean',
        ]);

        // Guardado de imagen
        if ($request->hasFile('imagenperro')) {
            $path = $request->file('imagenperro')->store('imagenes', 'public');
            $validated['imagenperro'] = $path;
        }

        // Agregar el user_id del refugio logueado
        $validated['user_id'] = auth()->id();

        Perros::create($validated);

        return redirect()->back()->with('success', 'Perro registrado correctamente');
    }
}
