<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViabilidadEstudios;
use App\Models\Adoptante;
use App\Models\Refugio;
use Illuminate\Support\Facades\Storage;

class ViabilidadEstudiosController extends Controller
{
    public function index()
    {
        $viabilidades = ViabilidadEstudios::all();
        return view('ViabilidadEstudios.index', compact('viabilidades'));
    }

    public function create()
    {
        $adoptantes = Adoptante::all();
        $refugios = Refugio::all();
        return view('ViabilidadEstudios.create', compact('adoptantes', 'refugios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'adoptante_id' => 'required|exists:adoptantes,id',
            'refugio_id' => 'required|exists:refugios,id',
            'archivo' => 'required|file|mimes:pdf,jpg,png|max:2048', // Acepta PDF e imágenes
        ]);

        // Guardar el archivo en storage
        $archivoPath = $request->file('archivo')->store('viabilidad', 'public');

        ViabilidadEstudios::create([
            'adoptante_id' => $request->adoptante_id,
            'refugio_id' => $request->refugio_id,
            'archivo' => $archivoPath,
        ]);

        return redirect()->route('ViabilidadEstudios.index')->with('success', 'Viabilidad registrada con éxito.');
    }

    public function destroy(ViabilidadEstudios $viabilidadEstudios)
    {
        // Eliminar el archivo del almacenamiento
        Storage::disk('public')->delete($viabilidadEstudios->archivo);

        $viabilidadEstudios->delete();

        return redirect()->route('ViabilidadEstudios.index')->with('success', 'Viabilidad eliminada con éxito.');
    }
}