<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HorarioDoctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HorariosDoctoresController extends Controller
{
    public function index()
    {
        $horarios = HorarioDoctor::all();
        return response()->json($horarios);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|integer',
            'dia_semana' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
        ]);

        $validatedData = $validator->validated();
        if ($validator->fails()) {
            return response()->json(['message' => 'Error en la validación de los datos', 'errors' => $validator->errors()], 422);
        }

        $exists = HorarioDoctor::where('doctor_id', $request->doctor_id)
            ->where('dia_semana', $request->dia_semana)
            ->where(function ($query) use ($request) {
                $query->whereBetween('hora_inicio', [$request->hora_inicio, $request->hora_fin])
                      ->orWhereBetween('hora_fin', [$request->hora_inicio, $request->hora_fin])
                      ->orWhere(function ($query) use ($request) {
                          $query->where('hora_inicio', '<=', $request->hora_inicio)
                                ->where('hora_fin', '>=', $request->hora_fin);
                      });
            })
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Ya existe un horario para este doctor en el día y horario especificado'], 422);
        }

        $horario = HorarioDoctor::create($validatedData);
        return response()->json($horario, 201);
    }

    public function show($id)
    {
        $horario = HorarioDoctor::find($id);

        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }

        return response()->json($horario);
    }

    public function update(Request $request, $id)
    {
        $horario = HorarioDoctor::find($id);

        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'doctor_id' => 'sometimes|integer',
            'dia' => 'sometimes|string',
            'hora_inicio' => 'sometimes|date_format:H:i',
            'hora_fin' => 'sometimes|date_format:H:i',
        ]);

        $horario->update($validatedData);
        return response()->json($horario);
    }

    public function destroy($id)
    {
        $horario = HorarioDoctor::find($id);

        if (!$horario) {
            return response()->json(['message' => 'Horario no encontrado'], 404);
        }

        $horario->delete();
        return response()->json(['message' => 'Horario eliminado correctamente']);
    }
}
