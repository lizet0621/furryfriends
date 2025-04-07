<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViabilidadEstudios;
use App\Models\Rol;
use Illuminate\Support\Facades\Auth;

class ViabilidadEstudiosController extends Controller
{
    public function index()
    {
        $viabilidades = ViabilidadEstudios::where('activo', true)->get();
        return view('ViabilidadEstudios.index', compact('viabilidades'));
    }

    public function create()
    {
        $roles = Rol::all(); // Por si necesitás mostrar roles
        return view('ViabilidadEstudios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $archivo = $request->file('archivo');
        $ruta = $archivo->store('viabilidadestudios', 'public');

        ViabilidadEstudios::create([
            'adoptante_id' => Auth::id(),
            'refugio_id' => Auth::user()->rol_id,
            'archivo' => $ruta,
            'nombre_original' => $archivo->getClientOriginalName(),
            'activo' => true,
        ]);

        return redirect()->route('ViabilidadEstudios.index')
                         ->with('success', 'Archivo subido exitosamente.');
    }

    public function destroy($id)
    {
        $viabilidad = ViabilidadEstudios::findOrFail($id);
        $viabilidad->update(['activo' => false]);

        return redirect()->route('ViabilidadEstudios.index')
                         ->with('success', 'Registro desactivado.');
    }
}