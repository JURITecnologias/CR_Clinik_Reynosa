<?php

namespace App\Services;

use App\Models\Consumible;
use App\Models\MovimientoConsumo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class InventarioService
{
    /**
     * Registrar movimiento de inventario (entrada, salida, ajuste)
     *
     * @param Consumible $consumible
     * @param string $tipo ('entrada'|'salida'|'ajuste')
     * @param int $cantidad
     * @param array $options (motivo, referencia_tipo, referencia_id, user_id)
     * @return MovimientoConsumo
     * @throws Exception
     */
    public function registrarMovimiento(Consumible $consumible, string $tipo, int $cantidad, array $options = [])
    {
        return DB::transaction(function () use ($consumible, $tipo, $cantidad, $options) {
            $cantidadAnterior = $consumible->stock_actual;
            $cantidadNueva = $cantidadAnterior;

            if ($tipo === 'entrada') {
                $cantidadNueva += $cantidad;
            } elseif ($tipo === 'salida') {
                if ($cantidad > $cantidadAnterior) {
                    throw new Exception('No hay suficiente stock para la salida solicitada.');
                }
                $cantidadNueva -= $cantidad;
            } elseif ($tipo === 'ajuste') {
                $cantidadNueva = $cantidad;
            } else {
                throw new Exception('Tipo de movimiento inválido.');
            }

            // Actualizar stock actual
            $consumible->stock_actual = $cantidadNueva;
            $consumible->save();

            // Registrar movimiento
            $movimiento = MovimientoConsumo::create([
                'consumible_id' => $consumible->id,
                'tipo_movimiento' => $tipo,
                'cantidad' => $cantidad,
                'cantidad_anterior' => $cantidadAnterior,
                'cantidad_nueva' => $cantidadNueva,
                'precio_unitario' => $consumible->precio_unitario_promedio,
                'costo_unitario' => $consumible->costo_unitario_promedio,
                'motivo' => $options['motivo'] ?? null,
                'referencia_tipo' => $options['referencia_tipo'] ?? null,
                'referencia_id' => $options['referencia_id'] ?? null,
                'user_id' => $options['user_id'] ?? (Auth::id() ?? 1),
            ]);

            return $movimiento;
        });
    }
}
