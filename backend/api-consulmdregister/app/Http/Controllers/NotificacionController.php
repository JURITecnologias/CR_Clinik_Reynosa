<?php

namespace App\Http\Controllers;

use App\Providers\NotificacionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificacionController extends Controller
{
    protected $notificacionService;

    public function __construct()
    {
        $this->notificacionService = new NotificacionService();
    }

    /**
     * Obtener notificaciones.
     * Si se pasa usuario_id, filtra por usuario. Opcionalmente leidas.
     */
    public function index(Request $request)
    {
        $per_page = $request->input('per_page', 15);
        $user = $request->user() ?? $request->get('authenticated_user');
        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        $mostrarTodas = $request->input('todas', false); // Si viene ?todas=1 muestra todas

        if ($mostrarTodas) {
            // Notificaciones globales (todas)
            $notificacionesGlobales = \App\Models\Notificacion::where('tipo', 'global')
                ->with(['paciente', 'doctor', 'consulta', 'citaPaciente']);

            // Notificaciones por rol o individuales (todas las del usuario)
            $notificacionesUsuario = $user->notificaciones()
                ->with(['paciente', 'doctor', 'consulta', 'citaPaciente']);

            $all = $notificacionesGlobales->get()->merge($notificacionesUsuario->get());
        } else {
            // Solo no leídas
            $notificacionesGlobales = \App\Models\Notificacion::where('tipo', 'global')
                ->whereDoesntHave('usuarios', function($q) use ($user) {
                    $q->where('notificacion_usuario.usuario_id', $user->id)->where('leida', true);
                })
                ->with(['paciente', 'doctor', 'consulta', 'citaPaciente']);

            $notificacionesUsuario = $user->notificaciones()
                ->wherePivot('leida', false)
                ->with(['paciente', 'doctor', 'consulta', 'citaPaciente']);

            $all = $notificacionesGlobales->get()->merge($notificacionesUsuario->get());
        }

        // Ordenar por created_at descendente
        $all = $all->sortByDesc('created_at')->values();
        $page = $request->input('page', 1);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $all->forPage($page, $per_page),
            $all->count(),
            $per_page,
            $page
        );
        return response()->json($paginator);
    }

    /**
     * Crear una nueva notificación.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario_id' => 'required|integer',
            'paciente_id' => 'nullable|integer',
            'doctor_id' => 'nullable|integer',
            'consulta_id' => 'nullable|integer',
            'cita_id' => 'nullable|integer',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|in:critica,informativa,normal,urgente,global',
            'rol_usuario' => 'nullable|string',
            'origen' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        $notificacion = $this->notificacionService->crear($data);
        return response()->json($notificacion, 201);
    }

    /**
     * Mostrar una notificación específica (no implementado en servicio).
     */
    public function show($id)
    {
        $notificacion = $this->notificacionService->getNotificacion($id);
        if ($notificacion) {
            return response()->json($notificacion);
        }
        return response()->json(['message' => 'Notificación no encontrada'], 404);
    }

    /**
     * Marcar notificación como leída.
     */
    public function update(Request $request, $id)
    {
        $notificacion = $this->notificacionService->getNotificacion($id);

        if (!$notificacion) {
            return response()->json(['message' => 'Notificación no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'usuario_id' => 'required|integer',
            'paciente_id' => 'nullable|integer',
            'doctor_id' => 'nullable|integer',
            'consulta_id' => 'nullable|integer',
            'cita_id' => 'nullable|integer',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|in:critica,informativa,normal,urgente,global',
            'rol_usuario' => 'nullable|string',
            'origen' => 'nullable|string',
            'leida' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        $notificacionActualizada = $this->notificacionService->actualizar($id, $data);

        return response()->json($notificacionActualizada);
    }

    public function marcarComoLeida($id, Request $request)
    {
        $user = $request->user() ?? $request->get('authenticated_user');
        $updated = $this->notificacionService->marcarComoLeidaPorUsuario($id, $user->id);
        if ($updated) {
            return response()->json(['message' => 'Notificación marcada como leída']);
        }
        return response()->json(['message' => 'Notificación no encontrada o ya leída'], 404);
    }

    /**
     * Eliminar una notificación.
     */
    public function destroy($id)
    {
        $deleted = $this->notificacionService->eliminar($id);
        if ($deleted) {
            return response()->json(['message' => 'Notificación eliminada']);
        }
        return response()->json(['message' => 'Notificación no encontrada'], 404);
    }

    /**
     * Obtener notificaciones por roles.
     */
    public function getByRoles(Request $request)
    {
        $roles = $request->query('roles', []);
        $per_page = $request->query('per_page', 15);
        $notificaciones = $this->notificacionService->getByRoles($roles)->paginate($per_page);
        return response()->json($notificaciones);
    }

    /**
     * Obtener notificaciones no leídas.
     */
    public function getNotificacionesNoLeidas(Request $request)
    {
        $per_page = $request->input('per_page', 15);
        $notificaciones = $this->notificacionService->getNotificacionesNoLeidas()->paginate($per_page);
        return response()->json($notificaciones);
    }

    public function getGlobalNotificaciones(Request $request)
    {
        $per_page = $request->input('per_page', 15);
        $notificaciones = $this->notificacionService->getGlobalNotificaciones()->paginate($per_page);
        return response()->json($notificaciones);
    }
}