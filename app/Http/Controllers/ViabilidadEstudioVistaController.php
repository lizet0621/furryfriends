<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ViabilidadEstudioVista;

class ViabilidadEstudioVistaController extends Controller
{
    public function mostrar(Request $request)
    {
        $query = ViabilidadEstudioVista::where('activo', true);

        if ($request->filled('archivo')) {
            $query->where('nombre_original', 'like', '%' . $request->archivo . '%');
        } else {
            $query->whereRaw('1 = 0'); // No muestra nada si no se busca
        }

        $viabilidades = $query->latest()->get();

        return view('viabilidadestudiovista', compact('viabilidades'));
    }

    public function subir(Request $request)
    {
        $request->validate([
            'archivos' => 'required|array',
            'archivos.*' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $ruta = $archivo->store('viabilidadestudios', 'public');
                ViabilidadEstudioVista::create([
                    'rol_id' => Auth::user()->id_rol,
                    'user_id' => Auth::id(),
                    'archivo' => $ruta,
                    'nombre_original' => $archivo->getClientOriginalName(),
                    'activo' => true,
                ]);
            }
        }

        return redirect()->route('viabilidadestudiovista.mostrar')->with('success', 'Documentos subidos con éxito.');
    }

    public function desactivar($id)
    {
        $estudio = ViabilidadEstudioVista::findOrFail($id);
        $estudio->update(['activo' => false]);

        return redirect()->route('viabilidadestudiovista.mostrar')->with('success', 'Documento desactivado con éxito.');
    }
}