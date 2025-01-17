<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    // Lista todos los contactos
    public function index()
    {
        return Contacto::with(['notas', 'direcciones', 'telefonos', 'emails', 'grupos'])->get();
    }

    // Crea un nuevo contacto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        return Contacto::create($validated);
    }

    // Muestra un contacto específico
    public function show($id)
    {
        return Contacto::with(['notas', 'direcciones', 'telefonos', 'emails', 'grupos'])->findOrFail($id);
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
}

