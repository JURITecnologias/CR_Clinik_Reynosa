<?php

// app/Http/Controllers/PacienteController.php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Listar todos los pacientes
    public function index()
    {
        return response()->json(Paciente::all());
    }

    // Mostrar un paciente específico
    public function show($id)
    {
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return response()->json(['mensaje' => 'Paciente no encontrado'], 404);
        }

        return response()->json($paciente);
    }

    // Crear un nuevo paciente (con detección de duplicados)
    public function store(Request $request)
    {
        $duplicado = Paciente::where('nombre', $request->nombre)
            ->where('apellido', $request->apellido)
            ->where('fecha_nacimiento', $request->fecha_nacimiento)
            ->first();

        if ($duplicado) {
            return response()->json(['mensaje' => 'Paciente duplicado detectado'], 409);
        }

        $paciente = Paciente::create($request->all());

        return response()->json($paciente, 201);
    }

    // Actualizar un paciente
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return response()->json(['mensaje' => 'Paciente no encontrado'], 404);
        }

        $paciente->update($request->all());

        return response()->json($paciente);
    }

    // Eliminar un paciente
    public function destroy($id)
    {
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return response()->json(['mensaje' => 'Paciente no encontrado'], 404);
        }

        $paciente->delete();

        return response()->json(['mensaje' => 'Paciente eliminado']);
    }

    // Buscar pacientes por varios campos
    public function buscar(Request $request)
    {
        $query = Paciente::query();

        if ($request->filled('nombre')) {
            $query->where('nombre', 'LIKE', '%' . $request->nombre . '%');
        }

        if ($request->filled('apellido')) {
            $query->where('apellido', 'LIKE', '%' . $request->apellido . '%');
        }

        if ($request->filled('telefono')) {
            $query->where('telefono', 'LIKE', '%' . $request->telefono . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        if ($request->filled('curp')) {
            $query->where('curp', 'LIKE', '%' . $request->curp . '%');
        }

        if ($request->filled('numero_seguro')) {
            $query->where('numero_seguro', 'LIKE', '%' . $request->numero_seguro . '%');
        }

        $resultados = $query->get();

        if ($resultados->isEmpty()) {
            return response()->json(['mensaje' => 'Paciente no encontrado'], 404);
        }

        return response()->json($resultados);
    }
}