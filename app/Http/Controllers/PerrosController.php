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

        // Obtenemos usuarios con rol de refugio
        $refugios = User::whereHas('rol', function ($q) {
            $q->where('nombre', 'Refugio');
        })->get();

        return view('Perros.index', compact('perros', 'refugios'));
    }

    public function create()
    {
        // Usuarios con rol "Refugio"
        $refugios = User::whereHas('rol', function ($q) {
            $q->where('nombre', 'Refugio');
        })->get();

        return view('Perros.create', compact('refugios'));

        $roles = Role::all(); // Asegúrate de que la tabla roles tenga datos
        return view('registroperros1', compact('roles'));
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
                'refugio_id' => 'required|exists:users,id',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagenPath = null;
            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('public/Perros');
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
                'refugio_id' => $request->refugio_id,
                'disponible' => $request->has('disponible') ? 1 : 0,
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
}