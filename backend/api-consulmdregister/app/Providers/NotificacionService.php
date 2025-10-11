<?php

namespace App\Providers;

use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class NotificacionService
{
    /**
     * Crear una nueva notificación.
     */
    public function crear(array $data): Notificacion
    {
        // Si es global, solo crea la notificación (sin usuario_id)
        if (($data['tipo'] ?? null) === 'global') {
            $notificacion = Notificacion::create($data);
            // No se crean registros en la pivote, se mostrarán a todos los usuarios según roles
            return $notificacion;
        }

        // Si es por rol, crea la notificación y registros en la pivote para cada usuario con ese rol
        if (!empty($data['rol_usuario'])) {
            $notificacion = Notificacion::create($data);
            $usuarios = User::whereHas('roles', function($q) use ($data) {
                $q->where('name', $data['rol_usuario']);
            })->get();

            foreach ($usuarios as $usuario) {
                DB::table('notificacion_usuario')->insert([
                    'notificacion_id' => $notificacion->id,
                    'usuario_id' => $usuario->id,
                    'leida' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return $notificacion;
        }

        // Si es individual, crea la notificación y el registro en la pivote solo para ese usuario
        $notificacion = Notificacion::create($data);
        if (!empty($data['usuario_id'])) {
            DB::table('notificacion_usuario')->insert([
                'notificacion_id' => $notificacion->id,
                'usuario_id' => $data['usuario_id'],
                'leida' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return $notificacion;
    }

    // Obtener todas las notificaciones NO leídas para un usuario
    public function obtenerNoLeidasPorUsuario($usuarioId)
    {
        // Notificaciones globales no leídas por el usuario
        $globales = Notificacion::where('tipo', 'global')
            ->whereDoesntHave('usuarios', function($q) use ($usuarioId) {
                $q->where('notificacion_usuario.usuario_id', $usuarioId)
                  ->where('leida', true);
            })
            ->with(['paciente', 'doctor', 'consulta', 'citaPaciente'])
            ->get();

        // Notificaciones por rol o individuales no leídas (en la pivote)
        $usuario = User::find($usuarioId);
        $usuarioNotificaciones = $usuario
            ? $usuario->notificaciones()
                ->wherePivot('leida', false)
                ->with(['paciente', 'doctor', 'consulta', 'citaPaciente'])
                ->get()
            : collect();

        // Unir ambas colecciones
        return $globales->merge($usuarioNotificaciones)->sortByDesc('created_at')->values();
    }

    // Marcar como leída para un usuario
    public function marcarComoLeidaPorUsuario($notificacionId, $usuarioId)
    {
        // Si es global, crea el registro en la pivote como leída
        $notificacion = Notificacion::find($notificacionId);
        if ($notificacion && $notificacion->tipo === 'global') {
            // Solo crea si no existe
            $exists = DB::table('notificacion_usuario')
                ->where('notificacion_id', $notificacionId)
                ->where('usuario_id', $usuarioId)
                ->exists();
            if (!$exists) {
                return DB::table('notificacion_usuario')->insert([
                    'notificacion_id' => $notificacionId,
                    'usuario_id' => $usuarioId,
                    'leida' => true,
                    'leida_en' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                return DB::table('notificacion_usuario')
                    ->where('notificacion_id', $notificacionId)
                    ->where('usuario_id', $usuarioId)
                    ->update(['leida' => true, 'leida_en' => now()]);
            }
        }
        // Si es por rol o individual, solo actualiza la pivote
        return DB::table('notificacion_usuario')
            ->where('notificacion_id', $notificacionId)
            ->where('usuario_id', $usuarioId)
            ->update(['leida' => true, 'leida_en' => now()]);
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
        ])->orderBy('created_at', 'desc');
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
        return Notificacion::where('tipo', 'global')->where('leida', false);
    }
}