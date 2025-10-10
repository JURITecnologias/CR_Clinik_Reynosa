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
     * Actualizar una notificación existente.
     */
    public function actualizar(int $id, array $data): ?Notificacion
    {
        $notificacion = Notificacion::find($id);
        if ($notificacion) {
            $notificacion->update($data);
        }
        return $notificacion;
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
        return $query->orderBy('created_at', 'desc')->with([
            'paciente',
            'doctor' => function ($query) {
                $query->select(['id', 'user_id', 'nombre_completo', 'titulo', 'universidad', 'cedula_profesional', 'especialista_en', 'fecha_nacimiento', 'experiencia', 'telefono_personal', 'telefono', 'telefono_emergencias', 'direccion', 'uuid', 'created_at', 'updated_at', 'deleted_at']);
            },
            'consulta',
            'citaPaciente'
        ]);
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

    public function getByRoles(array $roles)
    {
        return Notificacion::where(function ($query) use ($roles) {
            foreach ($roles as $rol) {
                $query->orWhere('rol_usuario', 'LIKE', '%' . $rol . '%');
            }
        })->with([
            'paciente',
            'doctor' => function ($query) {
                $query->select(['id', 'user_id', 'nombre_completo', 'titulo', 'universidad', 'cedula_profesional', 'especialista_en', 'fecha_nacimiento', 'experiencia', 'telefono_personal', 'telefono', 'telefono_emergencias', 'direccion', 'uuid', 'created_at', 'updated_at', 'deleted_at']);
            },
            'consulta',
            'citaPaciente'
        ]);
    }

    public function getNotificacion($id){
        return Notificacion::where('id', $id)->with([
            'paciente',
            'doctor' => function ($query) {
                $query->select(['id', 'user_id', 'nombre_completo', 'titulo', 'universidad', 'cedula_profesional', 'especialista_en', 'fecha_nacimiento', 'experiencia', 'telefono_personal', 'telefono', 'telefono_emergencias', 'direccion', 'uuid', 'created_at', 'updated_at', 'deleted_at']);
            },
            'consulta',
            'citaPaciente'
        ])->first();
    }

    public function getNotificacionesNoLeidas()
    {
        return Notificacion::where('leida', false)->with([
            'paciente',
            'doctor' => function ($query) {
                $query->select(['id', 'user_id', 'nombre_completo', 'titulo', 'universidad', 'cedula_profesional', 'especialista_en', 'fecha_nacimiento', 'experiencia', 'telefono_personal', 'telefono', 'telefono_emergencias', 'direccion', 'uuid', 'created_at', 'updated_at', 'deleted_at']);
            },
            'consulta',
            'citaPaciente'
        ]);
    }

    public function getNotificacionesAll(){
        return Notificacion::with([
            'paciente',
            'doctor' => function ($query) {
                $query->select(['id', 'user_id', 'nombre_completo', 'titulo', 'universidad', 'cedula_profesional', 'especialista_en', 'fecha_nacimiento', 'experiencia', 'telefono_personal', 'telefono', 'telefono_emergencias', 'direccion', 'uuid', 'created_at', 'updated_at', 'deleted_at']);
            },
            'consulta',
            'citaPaciente'
        ]);
    }

    public function getGlobalNotificaciones()
    {
        return Notificacion::where('tipo', 'global');
    }
}