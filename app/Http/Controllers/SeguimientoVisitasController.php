<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoVisitas;
use App\Models\Rol;
use Illuminate\Support\Facades\Storage;

class SeguimientoVisitasController extends Controller
{
    public function index()
    {
        $seguimientos = SeguimientoVisitas::where('activo', true)->get();
        return view('SeguimientoVisitas.index', compact('seguimientos'));
    }

    public function create()
    {
        $roles = Rol::all(); // Si necesitas mostrar roles en un select
        return view('SeguimientoVisitas.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'archivos' => 'required',
            'archivos.*' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $ruta = $archivo->store('seguimientovisitas', 'public');

                SeguimientoVisitas::create([
                    'role_id' => $request->role_id,
                    'archivo' => $ruta,
                    'nombre_original' => $archivo->getClientOriginalName(),
                    'activo' => true,
                ]);
            }
        }

        return redirect()->route('SeguimientoVisitas.index')
                         ->with('success', 'Archivos subidos exitosamente.');
    }

    public function destroy($id)
    {
        $seguimiento = SeguimientoVisitas::findOrFail($id);
        $seguimiento->update(['activo' => false]);

        return redirect()->route('SeguimientoVisitas.index')
                         ->with('success', 'Registro desactivado.');
    }
}