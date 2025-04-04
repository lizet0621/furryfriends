<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoVisitasVista;

class SeguimientoVisitasVistaController extends Controller
{
    public function mostrar(Request $request)
    {
        $query = SeguimientoVisitasVista::where('activo', true);

        if ($request->has('search') && $request->search != '') {
            $query->where('archivo', 'like', '%' . $request->search . '%');
        }

        $seguimientos = $query->latest()->get();

        return view('seguimientovisitasvista', compact('seguimientos'));
    }

    public function subir(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'archivos' => 'required|array',
            'archivos.*' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $ruta = $archivo->store('seguimientovisitas', 'public');
                SeguimientoVisitasVista::create([
                    'role_id' => $request->role_id,
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