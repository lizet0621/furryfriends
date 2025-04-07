<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SeguimientoVisitasVista;

class SeguimientoVisitasVistaController extends Controller
{
    public function mostrar(Request $request)
    {
        $query = SeguimientoVisitasVista::where('activo', true);

        if ($request->filled('archivo')) {
            $query->where('nombre_original', 'like', '%' . $request->archivo . '%');
        } else {
            $query->whereRaw('1 = 0'); // Ocultar si no se busca
        }

        $seguimientos = $query->latest()->get();

        return view('seguimientovisitasvista', compact('seguimientos'));
    }

    public function subir(Request $request)
    {
        $request->validate([
            'archivos' => 'required|array',
            'archivos.*' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $ruta = $archivo->store('seguimientovisitas', 'public');
                SeguimientoVisitasVista::create([
                    'rol_id' => Auth::user()->id_rol,
                    'user_id' => Auth::id(),
                    'archivo' => $ruta,
                    'nombre_original' => $archivo->getClientOriginalName(),
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