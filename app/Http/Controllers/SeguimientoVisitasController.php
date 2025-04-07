<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoVisitas;
use Illuminate\Support\Facades\Storage;

class SeguimientoVisitasController extends Controller
{
    public function index()
    {
        $seguimientos = SeguimientoVisitas::all();
        return view('SeguimientoVisitas.index', compact('seguimientos'));
    }

    public function create()
    {
        return view('SeguimientoVisitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id', // Cambiado de adoptante_id a role_id
            'archivos' => 'required', 
            'archivos.*' => 'file|mimes:pdf,jpg,png|max:2048', 
        ]);
        
        // Subir múltiples archivos
        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $ruta = $archivo->store('seguimientovisitas', 'public');
                SeguimientoVisitas::create([
                    'role_id' => $request->role_id, // Cambiado de adoptante_id a role_id
                    'archivo' => $ruta,
                ]);
            }
        }

        return redirect()->route('SeguimientoVisitas.index')
                         ->with('success', 'Archivos subidos exitosamente.');
    }

    public function destroy($id)
    {
        $seguimiento = SeguimientoVisitas::findOrFail($id);

        // Desactivar el registro en lugar de eliminarlo físicamente
        $seguimiento->update(['activo' => false]);

        return redirect()->route('SeguimientoVisitas.index')
                         ->with('success', 'Registro desactivado.');
    }
}