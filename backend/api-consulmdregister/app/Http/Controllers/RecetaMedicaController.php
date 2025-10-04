<?php

namespace App\Http\Controllers;

use App\Models\RecetaMedica;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\ConfiguracionSistema;

class RecetaMedicaController extends Controller
{
    // Crear una receta médica
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'paciente_id' => 'required|integer|exists:pacientes,id',
            'consulta_id' => 'required|integer|exists:consultas,id',
            'doctor_id' => 'required|integer|exists:informacion_doctor,id',
            'medicamentos' => 'nullable|array',
            'fecha_emision' => 'required|date',
            'fecha_consulta' => 'required|date',
            'nombre_doctor' => 'required|string',
            'titulo_doctor' => 'required|string',
            'numero_cedula' => 'required|string',
            'telefono_doctor' => 'required|string',
            'nombre_completo_paciente' => 'required|string',
            'fecha_nacimiento_paciente' => 'required|string',
            'edad_paciente' => 'required|string',
            'signos_vitales' => 'nullable|array',
            'diagnostico' => 'required|string',
            'servicios_medicos' => 'nullable|array',
            'pc_name' => 'nullable|string',
            'created_by' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        $config = ConfiguracionSistema::firstOrCreate(
            ['variable' => 'folio_receta'],
            ['valor' => 1]
        );

        $data['folio_receta'] = $config->valor;

        $config->valor += 1;
        $config->save();
        

        $data['uuid'] = (string) \Illuminate\Support\Str::uuid();
        $data['ip_address'] = $request->ip();
        $data['pc_name'] = $request->header('x-host-client',null);

        $contenido = $data['uuid']."|".$data['nombre_completo_paciente']."|".$data['fecha_nacimiento_paciente'];
        $hash = hash('sha256', $contenido);
        $privateKey = openssl_pkey_get_private(file_get_contents(storage_path('app\\keys\\private.pem')));
        openssl_sign($hash, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        $data['certificate'] = base64_encode($signature);

        $receta = RecetaMedica::create($data);
        return response()->json($receta, 201);
    }

    // Eliminar receta médica por UUID (soft delete)
    public function destroyByUuid($uuid)
    {
        $receta = RecetaMedica::where('uuid', $uuid)->firstOrFail();
        $receta->delete();
        return response()->json(['message' => 'Receta eliminada'], 200);
    }

    // Obtener receta médica por UUID
    public function showByUuid($uuid)
    {
        $receta = RecetaMedica::where('uuid', $uuid)->firstOrFail();
        return response()->json($receta);
    }

    // Obtener receta médica por consulta ID
    public function showByConsultaId($consultaId)
    {
        $receta = RecetaMedica::where('consulta_id', $consultaId)->first();

        if (!$receta) {
            return response()->json(['message' => 'Receta no encontrada'], 404);
        }

        return response()->json(['uuid' => $receta->uuid]);
    }
}
