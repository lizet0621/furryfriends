<?php

namespace App\Http\Controllers;

use App\Models\Refugio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RefugioController extends Controller
{
    /**
     * Muestra la lista de refugios.
     */
    public function index()
    {
        $refugios = Refugio::all();
        return view('refugios.index', compact('refugios'));
    }

    /**
     * Muestra el formulario de creación de refugio.
     */
    public function create()
    {
        return view('refugios.create');
    }

    /**
     * Guarda un nuevo refugio en la base de datos.
     */
    public function store(Request $request)
    {
        $esFisico = $request->tipo_refugio === 'fisico';

        // Validación de datos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:refugios,email',
            'password' => 'required|string|min:6',
            'tipo_refugio' => 'required|string|in:natural,fisico',
            'direccion' => $esFisico ? 'required|string' : 'nullable|string',
            'ciudad' => $esFisico ? 'required|string' : 'nullable|string',
            'capacidad' => $esFisico ? 'required|integer|min:1' : 'nullable|integer',
            'horarios' => $esFisico ? 'required|string' : 'nullable|string',
            'responsable' => $esFisico ? 'required|string' : 'nullable|string',
            'servicios' => $esFisico ? 'required|string' : 'nullable|string',
        ]);


        // Encriptar la contraseña antes de almacenarla
    $password = Hash::make($request->password);

        // Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
            

        }
        

        try {
            // Crear Refugio
            $refugio = Refugio::create([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash de la contraseña
                'tipo_refugio' => $request->tipo_refugio,
                'direccion' => $request->direccion,
                'ciudad' => $request->ciudad,
                'capacidad' => $request->capacidad,
                'horarios' => $request->horarios,
                'responsable' => $request->responsable,
                'servicios' => $request->servicios,
            ]);

            // Redirigir al login con un mensaje de éxito
            return redirect('/login')->with('success', 'Refugio registrado exitosamente.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Error al registrar refugio: ' . $e->getMessage()])->withInput();
    }
}

    /**
     * Muestra los detalles de un refugio específico.
     */
    public function show(Refugio $refugio)
    {
        return view('refugios.show', compact('refugio'));
    }

    /**
     * Muestra el formulario de edición de un refugio.
     */
    public function edit(Refugio $refugio)
    {
        return view('refugios.edit', compact('refugio'));
    }

    /**
     * Actualiza un refugio en la base de datos.
     */
    public function update(Request $request, Refugio $refugio)
    {
        $esFisico = $request->tipo_refugio === 'fisico';

        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:refugios,email,' . $refugio->id,
            'tipo_refugio' => 'required|string|in:natural,fisico',
            'direccion' => $esFisico ? 'required|string' : 'nullable|string',
            'ciudad' => $esFisico ? 'required|string' : 'nullable|string',
            'capacidad' => $esFisico ? 'required|integer|min:1' : 'nullable|integer',
            'horarios' => $esFisico ? 'required|string' : 'nullable|string',
            'responsable' => $esFisico ? 'required|string' : 'nullable|string',
            'servicios' => $esFisico ? 'required|string' : 'nullable|string',
        ]);

        // Actualizar datos
        $refugio->update($request->all());

        return redirect()->route('refugios.index')->with('success', 'Refugio actualizado correctamente.');
    }

    /**
     * Elimina un refugio de la base de datos.
     */
    public function destroy(Refugio $refugio)
    {
        $refugio->delete();
        return redirect()->route('refugios.index')->with('success', 'Refugio eliminado correctamente.');
    }


    public function login(Request $request)
{
    // Validación de los datos del formulario de login
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);



    // Intentar obtener el refugio con el email proporcionado
    $refugio = Refugio::where('email', $request->email)->first();

    // Si el refugio existe y la contraseña es correcta
    if ($refugio && Hash::check($request->password, $refugio->password)) {
        // Iniciar sesión (puedes usar Auth::login($refugio) si prefieres trabajar con autenticación)
        Auth::login($refugio);
        return redirect()->route('dashboard');  // O la ruta a donde quieres redirigir
    } else {
        // Si no coinciden las credenciales
        return back()->withErrors(['email' => 'Las credenciales son incorrectas.']);
    }
}
}