<?php

namespace App\Providers;

use App\Models\Notificacion;

class NotificacionService
{
    /**
     * Crear una nueva notificación.
     */
    public function crear(array $data): Notificacion
    {
        return Notificacion::create($data);
    }

    /**
     * Marcar una notificación como leída.
     */
    public function marcarComoLeida(int $id): ?Notificacion
    {
        $notificacion = Notificacion::find($id);
        if ($notificacion) {
            $notificacion->leida = true;
            $notificacion->save();
        }
        return $notificacion;
    }

    /**
     * Obtener notificaciones por usuario.
     */
    public function obtenerPorUsuario(int $usuarioId, $leidas = null)
    {
        $query = Notificacion::where('usuario_id', $usuarioId);
        if (!is_null($leidas)) {
            $query->where('leida', $leidas);
        }
        return $query->orderBy('created_at', 'desc')->get();
    }

    /**
     * Eliminar (soft delete) una notificación.
     */
    public function eliminar(int $id): bool
    {
        $notificacion = Notificacion::find($id);
        if ($notificacion) {
            $notificacion->delete();
            return true;
        }
        return false;
    }
}