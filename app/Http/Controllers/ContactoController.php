<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    // Lista todos los contactos
    public function index()
    {
        $contactos = Contacto::with(['notas', 'direcciones', 'telefonos', 'emails', 'grupos'])->get();
        return view('contactos.index', compact('contactos'));
    }

    // Crea un nuevo contacto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        Contacto::create($validated);
        return redirect()->route('contactos.index')->with('success', 'Contacto creado con éxito.');
    }

    // Muestra un contacto específico
    public function show($id)
    {
        $contacto = Contacto::with(['notas', 'direcciones', 'telefonos', 'emails', 'grupos'])->findOrFail($id);
        return view('contactos.show', compact('contacto'));
    }

    // Actualiza un contacto existente
    public function update(Request $request, $id)
    {
        $contacto = Contacto::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'apellidos' => 'string|max:255',
            'user_id' => 'exists:users,id',
        ]);

        $contacto->update($validated);

        return $contacto;
    }

    // Elimina un contacto
    public function destroy($id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return response()->json(['message' => 'Contacto eliminado con éxito.']);
    }

    // Agrega métodos create y edit para manejar formularios de creación y edición
    public function create()
    {
        return view('contactos.create');
    }

    public function edit($id)
    {
        $contacto = Contacto::findOrFail($id);
        return view('contactos.edit', compact('contacto'));
    }
}
