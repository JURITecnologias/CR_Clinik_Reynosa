<?php

// app/Http/Controllers/PacienteController.php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Listar todos los pacientes
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 15);
        $pacientes = Paciente::paginate($perPage);
        return response()->json($pacientes);
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
        $perPage = $request->get('per_page', 15);
        $query = Paciente::query();

        if ($nombreCompleto = $request->query('nombre')) {
            $query->whereRaw("CONCAT(nombre, ' ', apellido) LIKE ?", ['%' . $nombreCompleto . '%']);
        }

        if ($telefono = $request->query('telefono')) {
            $query->where('telefono', 'LIKE', '%' . $telefono . '%');
        }

        if ($email = $request->query('email')) {
            $query->where('email', 'LIKE', '%' . $email . '%');
        }

        if ($curp = $request->query('curp')) {
            $query->where('curp', 'LIKE', '%' . $curp . '%');
        }

        if ($numero_seguro = $request->query('numero_seguro')) {
            $query->where('numero_seguro', 'LIKE', '%' . $numero_seguro . '%');
        }

        $resultados = $query->paginate($perPage);

        if ($resultados->isEmpty()) {
            return response()->json(['mensaje' => 'Paciente no encontrado'], 404);
        }

        return response()->json($resultados);
    }
}