<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PerfilController extends Controller
{
    // Muestra la vista del perfil
    public function mostrar()
    {
        $usuario = Auth::user(); // Usuario autenticado
        return view('perfil', compact('usuario'));
    }

    // Actualiza los datos del usuario
    public function actualizar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        $usuario = Auth::user();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $usuario->save(); // << esto guarda los cambios

        return redirect()->route('perfil.mostrar')->with('success', 'Perfil actualizado correctamente');
    }

    // Elimina el usuario autenticado
    public function eliminar()
    {
        $usuario = Auth::user();

        Auth::logout(); // Cierra sesión antes de eliminar

        $usuario->delete(); // Elimina el usuario

        return redirect('/')->with('success', 'Tu cuenta ha sido eliminada');
    }
}