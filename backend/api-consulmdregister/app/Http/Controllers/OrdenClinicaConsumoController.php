<?php

namespace App\Http\Controllers;

use App\Models\OrdenClinicaConsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdenClinicaConsumoController extends Controller
{
    // Agregar múltiples consumos a una orden clínica
    public function storeMultiple(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orden_clinica_id' => 'required|exists:ordenes_clinicas,id',
            'consumos' => 'required|array|min:1',
            'consumos.*.consumible_id' => 'nullable|exists:consumibles,id',
            'consumos.*.kit_id' => 'nullable|exists:kits_consumibles,id',
            'consumos.*.cantidad' => 'required|integer|min:1',
            'consumos.*.user_id' => 'required|exists:users,id',
            'consumos.*.nota' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        $orden_clinica_id = $data['orden_clinica_id'];
        $result = [];
        foreach ($data['consumos'] as $item) {
            $item['orden_clinica_id'] = $orden_clinica_id;
            $result[] = \App\Models\OrdenClinicaConsumo::create($item);
        }
        return response()->json(['added' => $result], 201);
    }

    // Listar consumos de una orden clínica
    public function index(Request $request)
    {
        $ordenId = $request->query('orden_clinica_id');
        $query = OrdenClinicaConsumo::with(['ordenClinica', 'consumible', 'kit', 'usuario']);
        if ($ordenId) {
            $query->where('orden_clinica_id', $ordenId);
        }
        return $query->paginate($request->query('per_page', 15));
    }

    // Crear un consumo para una orden clínica
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orden_clinica_id' => 'required|exists:ordenes_clinicas,id',
            'consumible_id' => 'nullable|exists:consumibles,id',
            'kit_id' => 'nullable|exists:kits_consumibles,id',
            'cantidad' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
            'nota' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        $consumo = OrdenClinicaConsumo::create($data);
        return response()->json($consumo->load(['ordenClinica', 'consumible', 'kit', 'usuario']), 201);
    }

    // Mostrar un consumo específico
    public function show($id)
    {
        $consumo = OrdenClinicaConsumo::with(['ordenClinica', 'consumible', 'kit', 'usuario'])->findOrFail($id);
        return response()->json($consumo);
    }

    // Actualizar un consumo
    public function update(Request $request, $id)
    {
        $consumo = OrdenClinicaConsumo::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'consumible_id' => 'nullable|exists:consumibles,id',
            'kit_id' => 'nullable|exists:kits_consumibles,id',
            'cantidad' => 'sometimes|required|integer|min:1',
            'user_id' => 'sometimes|required|exists:users,id',
            'nota' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $consumo->update($validator->validated());
        return response()->json($consumo->load(['ordenClinica', 'consumible', 'kit', 'usuario']));
    }

    // Eliminar (soft delete) un consumo
    public function destroy($id)
    {
        $consumo = OrdenClinicaConsumo::findOrFail($id);
        $consumo->delete();
        return response()->json(['message' => 'Consumo eliminado de la orden clínica']);
    }

    // Obtener consumos por ID de orden clínica
    public function getByOrdenClinicaId($ocid)
    {
        $consumos = OrdenClinicaConsumo::with([ 'consumible', 'kit','kit.kit','kit.kit.consumibles'])
            ->where('orden_clinica_id', $ocid)
            ->get();

        return response()->json($consumos);
    }

    public function updateCantidad(Request $request, $id)
    {
        $consumo = OrdenClinicaConsumo::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'cantidad' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $consumo->cantidad = $request->input('cantidad');
        $consumo->save();
        return response()->json($consumo->load(['ordenClinica', 'consumible', 'kit', 'usuario']));
    }
}
