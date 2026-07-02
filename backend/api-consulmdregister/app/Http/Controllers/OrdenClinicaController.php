<?php

namespace App\Http\Controllers;

use App\Models\OrdenClinica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrdenClinicaController extends Controller
{
    // Listar órdenes clínicas con paginación y búsqueda
    public function index(Request $request)
    {
        try {
            $perPage = (int) $request->query('per_page', 15);
            if ($perPage <= 0) {
                $perPage = 15;
            }

            $query = OrdenClinica::with(['paciente', 'consulta', 'doctor', 'usuario']);

            if ($request->filled('search')) {
                $search = trim((string) $request->query('search'));
                $query->where(function ($q) use ($search) {
                    $q->where('folio_orden', 'like', "%$search%")
                        ->orWhere('uuid', 'like', "%$search%")
                        ->orWhere('estado', 'like', "%$search%")
                        ->orWhereHas('paciente', function ($pacienteQuery) use ($search) {
                            $pacienteQuery->where(DB::raw("CONCAT(nombre, ' ', apellido)"), 'like', "%$search%");
                        })
                        ->orWhereHas('doctor', function ($doctorQuery) use ($search) {
                            $doctorQuery->where('nombre_completo', 'like', "%$search%");
                        });
                });
            }

            if ($request->filled('paciente_id') && is_numeric($request->query('paciente_id'))) {
                $query->where('paciente_id', (int) $request->query('paciente_id'));
            }
            if ($request->filled('doctor_id') && is_numeric($request->query('doctor_id'))) {
                $query->where('doctor_id', (int) $request->query('doctor_id'));
            }
            if ($request->filled('consulta_id') && is_numeric($request->query('consulta_id'))) {
                $query->where('consulta_id', (int) $request->query('consulta_id'));
            }

            $allowedOrderColumns = ['created_at', 'fecha_orden', 'folio_orden', 'estado'];
            $order = (string) $request->query('order', 'created_at');
            if (!in_array($order, $allowedOrderColumns, true)) {
                $order = 'created_at';
            }

            $orderDirection = strtolower((string) $request->query('direction', 'desc'));
            if (!in_array($orderDirection, ['asc', 'desc'], true)) {
                $orderDirection = 'desc';
            }

            $result = $query->orderBy($order, $orderDirection)->paginate($perPage);
            $result->getCollection()->transform(function ($item) {
                if ($item->doctor) {
                    unset($item->doctor->firma);
                    unset($item->doctor->universidad);
                    unset($item->doctor->cedula_profesional);
                    unset($item->doctor->especialista_en);
                    unset($item->doctor->fecha_nacimiento);
                    unset($item->doctor->experiencia);
                    unset($item->doctor->telefono_personal);
                    unset($item->doctor->telefono);
                    unset($item->doctor->telefono_emergencias);
                    unset($item->doctor->direccion);
                    unset($item->doctor->created_at);
                    unset($item->doctor->updated_at);
                    unset($item->doctor->deleted_at);
                }
                return $item;
            });

            return $result;
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error al listar órdenes clínicas',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Crear una nueva orden clínica
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'paciente_id' => 'required|exists:pacientes,id',
            'consulta_id' => 'nullable|exists:consultas,id',
            'estado' => 'in:pendiente,en_proceso,cancelada,completada',
            'servicios_solicitados' => 'required|array',
            'doctor_id' => 'nullable|exists:informacion_doctor,id',
            'fecha_orden' => 'required|date',
            'observaciones' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'atencion_usuario_id' => 'nullable|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        $data['uuid'] = \Illuminate\Support\Str::uuid()->toString();

        //obtenemos el folio de la orden de la configuración del sistema
        $folioOrden = DB::table('configuracion_sistema')->where('variable', 'folio_orden_clinica')->value('valor');
        $data['folio_orden'] = is_numeric($folioOrden) ? (int)$folioOrden : 1;

        $orden = OrdenClinica::create($data);
        $response = $orden->load(['paciente', 'consulta', 'doctor', 'usuario', 'consumos']);

        if ($response->doctor) {
            unset($response->doctor->firma);
        }

        //actualizamos el folio de la orden en la configuración del sistema
        $nuevoFolio = (is_numeric($folioOrden) ? (int)$folioOrden : 1) + 1;
        DB::table('configuracion_sistema')->where('variable', 'folio_orden_clinica')->update(['valor' => $nuevoFolio]);

        return response()->json($response, 201);
    }

    // Mostrar una orden clínica específica
    public function show($id)
    {
        $orden = OrdenClinica::with(['paciente', 'consulta', 'doctor', 'usuario', 'consumos','consumos.consumible','consumos.kit.kit','consumos.kit.kit.consumibles'])->findOrFail($id);
        if ($orden->doctor) {
            unset($orden->doctor->firma);
            unset($orden->doctor->universidad);
            unset($orden->doctor->cedula_profesional);
            unset($orden->doctor->especialista_en);
            unset($orden->doctor->fecha_nacimiento);
            unset($orden->doctor->experiencia);
            unset($orden->doctor->telefono_personal);
            unset($orden->doctor->telefono);
            unset($orden->doctor->telefono_emergencias);
            unset($orden->doctor->direccion);
            unset($orden->doctor->created_at);
            unset($orden->doctor->updated_at);
            unset($orden->doctor->deleted_at);

        }
        return response()->json($orden);
    }

    // Actualizar una orden clínica
    public function update(Request $request, $id)
    {
        $orden = OrdenClinica::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'folio_orden' => 'sometimes|required|integer|unique:ordenes_clinicas,folio_orden,' . $id,
            'estado' => 'sometimes|in:pendiente,en_proceso,cancelada,completada',
            'servicios_solicitados' => 'sometimes|required|array',
            'doctor_id' => 'sometimes|required|exists:informacion_doctor,id',
            'fecha_orden' => 'sometimes|required|date',
            'observaciones' => 'nullable|string',
            'user_id' => 'sometimes|required|exists:users,id',
            'atencion_usuario_id' => 'nullable|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $orden->update($validator->validated());
        return response()->json($orden->load(['paciente', 'consulta', 'doctor', 'usuario', 'consumos']));
    }

    // Eliminar (soft delete) una orden clínica
    public function destroy($id)
    {
        $orden = OrdenClinica::findOrFail($id);
        $orden->delete();
        return response()->json(['message' => 'Orden clínica eliminada']);
    }

    public function updateEstado(Request $request, $id)
    {
        $orden = OrdenClinica::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'estado' => 'required|in:pendiente,en_proceso,cancelada,completada',
            'atencion_usuario_id' => 'nullable|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $orden->update($validator->validated());
        return response()->json($orden);
    }
}
