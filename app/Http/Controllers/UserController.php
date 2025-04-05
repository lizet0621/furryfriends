<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::where('activo', true)->with('role')->get(); // Filtrar usuarios activos
        return view('Users.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('Users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'capacidad' => 'nullable|integer',
            'horarios' => 'nullable|string',
            'responsable' => 'nullable|string',
            'servicios' => 'nullable|string',
            'id_rol' => 'required|exists:roles,id'
        ]);

        User::create($validated);

        return redirect()->route('Users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show(User $User)
    {
        return view('Users.show', compact('User'));
    }

    public function edit(User $User)
    {
        $roles = Role::all();
        return view('Users.edit', compact('User', 'roles'));
    }

    public function update(Request $request, User $User)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $User->id,
            'password' => 'nullable|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'capacidad' => 'nullable|integer',
            'horarios' => 'nullable|string',
            'responsable' => 'nullable|string',
            'servicios' => 'nullable|string',
            'id_rol' => 'required|exists:roles,id'
        ]);

        if ($request->filled('password')) {
            $User->password = $validated['password'];
        }

        $User->fill($validated);
        $User->save();

        return redirect()->route('Users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $User)
    {
        $User->activo = false; // Cambiar el estado a inactivo
        $User->save();
        return redirect()->route('Users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}