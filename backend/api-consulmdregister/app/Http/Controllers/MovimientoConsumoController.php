<?php

namespace App\Http\Controllers;

use App\Models\Consumible;
use App\Models\MovimientoConsumo;
use App\Services\InventarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimientoConsumoController extends Controller
{
    protected $inventarioService;

    public function __construct(InventarioService $inventarioService)
    {
        $this->inventarioService = $inventarioService;
    }

    // Listar movimientos de un consumible por UUID
    public function index(Request $request, $consumible_uuid)
    {
        $perPage = $request->query('per_page', 15);
        $consumible = Consumible::where('uuid', $consumible_uuid)->firstOrFail();
        $query = MovimientoConsumo::where('consumible_id', $consumible->id);
        if ($request->has('fecha_inicio')) {
            $fechaInicio = $request->query('fecha_inicio') . ' 00:00:00';
            $query->where('created_at', '>=', $fechaInicio);
        }
        if ($request->has('fecha_fin')) {
            $fechaFin = $request->query('fecha_fin') . ' 23:59:59';
            $query->where('created_at', '<=', $fechaFin);
        }
        $movimientos = $query->orderByDesc('created_at')->paginate($perPage);
        return response()->json($movimientos);
    }

    // Listar todos los movimientos (global, con filtros)
    public function all(Request $request)
    {
        $perPage = $request->query('per_page', 15);
        $query = MovimientoConsumo::query();
        if ($request->has('consumible_id')) {
            $query->where('consumible_id', $request->query('consumible_id'));
        }
        if ($request->has('fecha_inicio')) {
            $fechaInicio = $request->query('fecha_inicio') . ' 00:00:00';
            $query->where('created_at', '>=', $fechaInicio);
        }
        if ($request->has('fecha_fin')) {
            $fechaFin = $request->query('fecha_fin') . ' 23:59:59';
            $query->where('created_at', '<=', $fechaFin);
        }
        $movimientos = $query->orderByDesc('created_at')->paginate($perPage);
        return response()->json($movimientos);
    }

    // Ver detalle de un movimiento
    public function show($id)
    {
        $movimiento = MovimientoConsumo::with(['consumible', 'usuario'])->findOrFail($id);
        return response()->json($movimiento);
    }

    // Registrar movimiento (entrada, salida, ajuste) usando uuid
    public function store(Request $request, $consumible_uuid)
    {
        $request->validate([
            'tipo_movimiento' => 'required|in:entrada,salida,ajuste',
            'cantidad' => 'required|integer|min:1',
            'motivo' => 'nullable|string',
            'referencia_tipo' => 'nullable|string',
            'referencia_id' => 'nullable|integer',
        ]);
        $consumible = Consumible::where('uuid', $consumible_uuid)->firstOrFail();
        $user_id = Auth::id() ?? 1;
        $movimiento = $this->inventarioService->registrarMovimiento(
            $consumible,
            $request->input('tipo_movimiento'),
            $request->input('cantidad'),
            [
                'motivo' => $request->input('motivo'),
                'referencia_tipo' => $request->input('referencia_tipo'),
                'referencia_id' => $request->input('referencia_id'),
                'user_id' => $user_id,
            ]
        );
        return response()->json($movimiento, 201);
    }
}
