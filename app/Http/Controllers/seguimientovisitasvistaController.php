<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoVisitasVista;

class SeguimientoVisitasVistaController extends Controller
{
    public function mostrar(Request $request)
    {
        $query = SeguimientoVisitasVista::where('activo', true);

        // Filtros multicriterio
        if ($request->filled('archivo')) {
            $query->where('archivo', 'like', '%' . $request->archivo . '%');
        }

        if ($request->filled('rol_id')) {
            $query->where('rol_id', $request->rol_id);
        }

        if ($request->filled('fecha_inicio')) {
            $query->whereDate('created_at', '>=', $request->fecha_inicio);
        }

        if ($request->filled('fecha_fin')) {
            $query->whereDate('created_at', '<=', $request->fecha_fin);
        }

        $seguimientos = $query->latest()->get();

        return view('seguimientovisitasvista', compact('seguimientos'));
    }

    public function subir(Request $request)
    {
        $request->validate([
            'rol_id' => 'required|exists:roles,id',
            'archivos' => 'required|array',
            'archivos.*' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $ruta = $archivo->store('seguimientovisitas', 'public');
                SeguimientoVisitasVista::create([
                    'rol_id' => $request->rol_id,
                    'archivo' => $ruta,
                    'activo' => true,
                ]);
            }
        }

        return redirect()->route('seguimientovisitasvista.mostrar')->with('success', 'Documentos subidos con éxito.');
    }

    public function desactivar($id)
    {
        $seguimiento = SeguimientoVisitasVista::findOrFail($id);
        $seguimiento->update(['activo' => false]);

        return redirect()->route('seguimientovisitasvista.mostrar')->with('success', 'Documento desactivado con éxito.');
    }
}