<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perros;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Log;

class PerrosController extends Controller
{
    public function index()
    {
        $perros = Perros::disponibles()->get();

        $refugios = User::whereHas('role', function ($q) {
            $q->where('nombre', 'Refugio');
        })->get();

        return view('Perros.index', compact('perros', 'refugios'));
    }

    public function create()
    {
        $roles = Role::all();

        $refugios = User::whereHas('role', function ($q) {
            $q->where('nombre', 'Refugio');
        })->get();

        return view('registroperros1', compact('roles', 'refugios'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'edad' => 'required|integer|min:0',
                'raza' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'tamanio' => 'required|string',
                'sexo' => 'required|string',
                'historial_clinico' => 'nullable|string',
                'descripcion' => 'nullable|string',
                'imagenperro' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'disponible' => 'required|in:0,1'
            ]);

            $imagenPath = null;
            if ($request->hasFile('imagenperro')) {
                $imagenPath = $request->file('imagen')->store('public/imagenes');
                $imagenPath = str_replace('public/', 'storage/', $imagenPath);
            }

            Perros::create([
                'nombre' => $request->nombre,
                'edad' => $request->edad,
                'imagenperro' => $imagenPath,
                'raza' => $request->raza,
                'color' => $request->color,
                'tamanio' => $request->tamanio,
                'sexo' => $request->sexo,
                'historial_clinico' => $request->historial_clinico,
                'descripcion' => $request->descripcion,
                'user_id' => auth()->id(),
                'disponible' => $request->disponible,
            ]);

            return redirect()->route('Perros.index')->with('success', '🐶 ¡Perro registrado con éxito!');
        } catch (\Exception $e) {
            Log::error('Error al registrar el perro: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al registrar el perro.');
        }
    }

    public function destroy($id)
    {
        $perro = Perros::findOrFail($id);
        $perro->update(['disponible' => 0]);

        return redirect()->route('Perros.index')->with('success', '🐶 El perro fue marcado como no disponible.');
    }

    public function show($id)
    {
        $perro = Perros::findOrFail($id);
        return view('Perros.show', compact('perro'));
    }

    public function edit($id)
    {
        $perro = Perros::findOrFail($id);
        return view('Perros.edit', compact('perro'));
    }

    // ✅ NUEVO MÉTODO AÑADIDO PARA EDIT FUNCIONAL
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'edad' => 'required|integer|min:0',
                'raza' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'tamano' => 'required|string',
                'sexo' => 'required|in:Macho,Hembra',
                'historial_clinico' => 'required|string',
                'descripcion' => 'required|string',
                'disponible' => 'required|boolean',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $perro = Perros::findOrFail($id);

            $perro->nombre = $request->nombre;
            $perro->edad = $request->edad;
            $perro->raza = $request->raza;
            $perro->color = $request->color;
            $perro->tamanio = $request->tamano;
            $perro->sexo = $request->sexo;
            $perro->historial_clinico = $request->historial_clinico;
            $perro->descripcion = $request->descripcion;
            $perro->disponible = $request->disponible;

            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('public/imagenes');
                $perro->imagenperro = str_replace('public/', 'storage/', $imagenPath);
            }

            $perro->save();

            return redirect()->route('Perros.index')->with('success', '🐾 Perro actualizado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar el perro: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el perro.');
        }
    }
}
