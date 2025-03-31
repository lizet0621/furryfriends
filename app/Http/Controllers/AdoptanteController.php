<?php

namespace App\Http\Controllers;

use App\Models\Adoptante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdoptanteController extends Controller
{
    // Mostrar lista de adoptantes
    public function index()
    {
        $adoptantes = Adoptante::all();
        return view('adoptantes.index', compact('adoptantes'));
    }

    // Mostrar formulario de registro
    public function create()
    {
        return view('adoptantes.create');
    }

    // Guardar nuevo adoptante
  public function store(Request $request)
{
    // Validación de los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:adoptantes,email',
        'telefono' => 'required|string|max:20',
        'password' => 'required|string|min:6',
        'direccion' => 'nullable|string|max:255', // Campo opcional
    ]);

    // Crear el adoptante y hashear la contraseña
    Adoptante::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'password' => Hash::make($request->password), // Hashear la contraseña
        'direccion' => $request->direccion ?? 'No especificada',
    ]);


// Loguear al usuario automáticamente
    Auth::login($adoptante);  // Esto loguea al adoptante recién registrado

    // Redirigir al login con mensaje de éxito
    return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
}


    // Mostrar formulario de edición
    public function edit(Adoptante $adoptante)
    {
        return view('adoptantes.edit', compact('adoptante'));
    }

    // Actualizar adoptante
    public function update(Request $request, Adoptante $adoptante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:adoptantes,email,' . $adoptante->id,
            'telefono' => 'required|string|max:15',
            'direccion' => 'nullable|string|max:255',
        ]);

        $adoptante->update($request->all());

        return redirect()->route('adoptantes.index')->with('success', 'Adoptante actualizado con éxito.');
    }

    // Eliminar adoptante
    public function destroy(Adoptante $adoptante)
    {
        $adoptante->delete();
        return redirect()->route('adoptantes.index')->with('success', 'Adoptante eliminado.');
   
    }

    public function perfil()
    {
        
        // Obtiene el usuario autenticado
        $usuario = Auth::user();
    
        // Si el usuario no está autenticado, redirige con un error
        if (!$usuario) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
    
        // Retorna la vista con la variable usuario
        return view('perfil', compact('usuario'));
    }
    
    public function actualizarPerfil(Request $request)
    {
        $usuario = auth()->user();
    
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);
    
        $usuario->update($request->all());
    
        return redirect()->route('perfil')->with('success', 'Perfil actualizado con éxito');
    }
    
    

}