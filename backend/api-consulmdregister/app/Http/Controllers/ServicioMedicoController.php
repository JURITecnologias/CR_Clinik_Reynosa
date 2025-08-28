<?php

namespace App\Http\Controllers;

use App\Models\ServicioMedico;
use Illuminate\Http\Request;

class ServicioMedicoController extends Controller
{
    // Listar todos los servicios (incluye opción para ver eliminados)
    public function index(Request $request)
    {
        $includeDeleted = $request->query('with_deleted', false);

        $servicios = $includeDeleted
            ? ServicioMedico::withTrashed()->get()
            : ServicioMedico::all();

        return response()->json($servicios);
    }

    // Crear un nuevo servicio
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:servicios_medicos,nombre',
        ]);

        $servicio = ServicioMedico::create([
            'nombre' => $request->nombre,
            'categoria'=>$request->categoria
        ]);

        return response()->json($servicio, 201);
    }

    // Actualizar un servicio existente
    public function update(Request $request, $id)
    {
        $servicio = ServicioMedico::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:servicios_medicos,nombre,' . $servicio->id,
        ]);

        $servicio->update([
            'nombre' => $request->nombre,
        ]);

        return response()->json($servicio);
    }

    // Borrado lógico
    public function destroy($id)
    {
        $servicio = ServicioMedico::findOrFail($id);
        $servicio->delete();

        return response()->json(['message' => 'Servicio eliminado correctamente']);
    }

    // Restaurar servicio eliminado
    public function restore($id)
    {
        $servicio = ServicioMedico::withTrashed()->findOrFail($id);

        if ($servicio->trashed()) {
            $servicio->restore();
            return response()->json(['message' => 'Servicio restaurado correctamente']);
        }

        return response()->json(['message' => 'El servicio no está eliminado'], 400);
    }
}