<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\InformacionDoctorController;
use App\Http\Controllers\ServicioMedicoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PdfRecetaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('basic.auth','check.permission:ver')->group(function () {
    Route::get('/profile', function (Request $request) {
        $user = $request->authenticated_user;

        $roles = $user->roles()->pluck('name');
        $permissions = $user->roles()
                            ->with('permissions')
                            ->get()
                            ->pluck('permissions')
                            ->flatten()
                            ->pluck('name')
                            ->unique();

        $doctorInfo = \App\Models\InformacionDoctor::where('user_id', $user->id)->first();

        return response()->json([
            'user' => $user->only(['id', 'name', 'email']),
            'roles' => $roles,
            'permissions' => $permissions,
            'doctor_info' => $doctorInfo,
        ]);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//auth routes
Route::post('/login', [AuthController::class, 'login']);

// User routes
Route::middleware('basic.auth','check.permission:ver')->group(function () {
  Route::get('/users', [UserController::class, 'index']);
  Route::get('/users/{id}', [UserController::class, 'show']);
  Route::post('/users/buscar/email', [UserController::class, 'findByEmail']);
});


Route::middleware('basic.auth', 'check.role:Main Admin|Admon|Doctor', 'check.permission:modificar|escribir|borrar')->group(function () {
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});


// role permission routes
Route::middleware(['basic.auth', 'check.role:Main Admin|Admon','check.permission:modificar|escribir|borrar'])->group(function () {
    Route::get('/roles/{id}/permissions', [RolePermissionController::class, 'showPermissions']);
    Route::post('/roles/{id}/permissions/assign', [RolePermissionController::class, 'assignPermissions']);
    Route::post('/roles/{id}/permissions/revoke', [RolePermissionController::class, 'revokePermissions']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon','check.permission:modificar|escribir|borrar'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    Route::post('/roles', [RoleController::class, 'store']);
//    Route::put('/roles/{id}', [RoleController::class, 'update']); disbaled to avoid issues
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);
});

// Paciente routes with role and permission checks
Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor|Enfermera','check.permission:modificar|escribir'])->group(function () {

    Route::post('/pacientes', [PacienteController::class, 'store']);
    Route::put('/pacientes/{id}', [PacienteController::class, 'update']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor','check.permission:borrar'])->group(function () {
    Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor|Enfermera','check.permission:ver'])->group(function () {

    Route::get('/pacientes/buscar', [PacienteController::class, 'buscar']);
    Route::get('/pacientes', [PacienteController::class, 'index']);
    Route::get('/pacientes/{id}', [PacienteController::class, 'show']);
});

// Información Doctor routes

Route::middleware(['basic.auth', 'check.permission:ver'])->group(function () {
    Route::get('/doctores', [InformacionDoctorController::class, 'index']);
    Route::get('/doctores/buscar', [InformacionDoctorController::class, 'buscarPorNombre']);
    Route::get('/doctores/todos', [InformacionDoctorController::class, 'indexConEliminados']);
    Route::get('/doctores/{id}', [InformacionDoctorController::class, 'show']);
    Route::post('/doctores/buscar/email', [InformacionDoctorController::class, 'buscarPorEmail']);
    Route::get('/doctores/eliminados', [InformacionDoctorController::class, 'soloEliminados']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor','check.permission:modificar|escribir'])->group(function () {
    Route::post('/doctores', [InformacionDoctorController::class, 'store']);
    Route::post('/doctores/{id}/restore', [InformacionDoctorController::class, 'restore']);
    Route::post('/doctores/{id}/firma', [InformacionDoctorController::class, 'subirFirma']);
    Route::put('/doctores/{id}', [InformacionDoctorController::class, 'update']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor', 'check.permission:borrar'])->group(function () {
    Route::delete('/doctores/{id}', [InformacionDoctorController::class, 'destroy']);
});

// Servicios medicos catalogo
Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor|Enfermera|Ventas','check.permission:ver'])->group(function () {
    Route::get('/servicios-medicos', [ServicioMedicoController::class, 'index']);
    Route::get('/servicios-medicos/buscar', [ServicioMedicoController::class, 'searchByName']);
    Route::get('/servicios-medicos/{id}', [ServicioMedicoController::class, 'show']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor','check.permission:modificar|escribir|borrar'])->group(function () {
    Route::post('/servicios-medicos', [ServicioMedicoController::class, 'store']);
    Route::put('/servicios-medicos/{id}', [ServicioMedicoController::class, 'update']);
    Route::delete('/servicios-medicos/{id}', [ServicioMedicoController::class, 'destroy']);
    Route::post('/servicios-medicos/{id}/restore', [ServicioMedicoController::class, 'restore']);
});

// Medicamentos catalogo

Route::middleware([
    'basic.auth',
    'check.role:Main Admin|Admon|Doctor|Enfermera|Ventas',
    'check.permission:ver'
])->group(function () {
    Route::get('/medicamentos', [MedicamentoController::class, 'index']);
    Route::get('/medicamentos/buscar', [MedicamentoController::class, 'search']);
    Route::get('/medicamentos/{id}', [MedicamentoController::class, 'show']);
});

Route::middleware([
    'basic.auth',
    'check.role:Main Admin|Admon|Doctor',
    'check.permission:modificar|escribir|borrar'
])->group(function () {
    Route::post('/medicamentos', [MedicamentoController::class, 'store']);
    Route::put('/medicamentos/{id}', [MedicamentoController::class, 'update']);
    Route::delete('/medicamentos/{id}', [MedicamentoController::class, 'destroy']);
});

// Paciente Historial Medico routes
Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor|Enfermera'])->group(function () {
    Route::post('/historial-medico', [\App\Http\Controllers\PacienteHistorialMedicoController::class, 'store']);
    Route::put('/historial-medico/{id}', [\App\Http\Controllers\PacienteHistorialMedicoController::class, 'update']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor','check.permission:borrar'])->group(function () {
    Route::delete('/historial-medico/{id}', [\App\Http\Controllers\PacienteHistorialMedicoController::class, 'destroy']);
});

Route::middleware(['basic.auth', 'check.permission:ver'])->group(function () {
    Route::get('/historial-medico/buscar', [\App\Http\Controllers\PacienteHistorialMedicoController::class, 'buscar']);
    Route::get('/historial-medico', [\App\Http\Controllers\PacienteHistorialMedicoController::class, 'index']);
    Route::get('/historial-medico/{id}', [\App\Http\Controllers\PacienteHistorialMedicoController::class, 'show']);
});

//consultas
Route::middleware(['basic.auth', 'check.role:Doctor', 'check.permission:escribir'])->group(function () {
    Route::post('/consultas', [\App\Http\Controllers\ConsultasController::class, 'store']); // Crear consulta + signos vitales
   Route::put('/consultas/{id}', [\App\Http\Controllers\ConsultasController::class, 'update']); // Actualizar consulta + signos vitales
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor', 'check.permission:borrar'])->group(function () {
    Route::delete('/consultas/{id}', [\App\Http\Controllers\ConsultasController::class, 'destroy']); // Soft delete
    Route::post('/consultas/{id}/restore', [\App\Http\Controllers\ConsultasController::class, 'restore']); // Restaurar
});

Route::middleware(['basic.auth', 'check.permission:ver'])->group(function () {
    Route::get('/consultas/buscar', [\App\Http\Controllers\ConsultasController::class, 'search']); // Buscar con filtros y paginación
    Route::get('/consultas', [\App\Http\Controllers\ConsultasController::class, 'index']); // Listar todas
    Route::get('/consultas/{id}', [\App\Http\Controllers\ConsultasController::class, 'show']); // Ver una consulta
   
});

//horarios doctores
Route::middleware(['basic.auth', 'check.role:Main Admin|Admon', 'check.permission:modificar|escribir'])->group(function () {
    Route::post('/horarios-doctores', [\App\Http\Controllers\HorariosDoctoresController::class, 'store']);
    Route::put('/horarios-doctores/{id}', [\App\Http\Controllers\HorariosDoctoresController::class, 'update']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon', 'check.permission:borrar'])->group(function () {
    Route::delete('/horarios-doctores/{id}', [\App\Http\Controllers\HorariosDoctoresController::class, 'destroy']);
});

Route::middleware(['basic.auth', 'check.permission:ver'])->group(function () {
    Route::get('/horarios-doctores', [\App\Http\Controllers\HorariosDoctoresController::class, 'index']);
    Route::get('/horarios-doctores/doctor/{doctorId}', [\App\Http\Controllers\HorariosDoctoresController::class, 'getHorariosByDoctorId']);
    Route::get('/horarios-doctores/{id}', [\App\Http\Controllers\HorariosDoctoresController::class, 'show']);
});

// Signos Vitales routes
Route::middleware(['basic.auth', 'check.permission:ver'])->group(function () {
    Route::get('/signos-vitales', [\App\Http\Controllers\SignosVitalesController::class, 'index']);
    Route::get('/signos-vitales/{id}', [\App\Http\Controllers\SignosVitalesController::class, 'show']);
    Route::get('/signos-vitales/paciente/{pacienteId}', [\App\Http\Controllers\SignosVitalesController::class, 'getByPacienteId']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor', 'check.permission:modificar|escribir'])->group(function () {
    Route::post('/signos-vitales', [\App\Http\Controllers\SignosVitalesController::class, 'store']);
    Route::put('/signos-vitales/{id}', [\App\Http\Controllers\SignosVitalesController::class, 'update']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor', 'check.permission:borrar'])->group(function () {
    Route::delete('/signos-vitales/{id}', [\App\Http\Controllers\SignosVitalesController::class, 'destroy']);
});

//ciastas pacientes
Route::middleware(['basic.auth', 'check.permission:ver'])->group(function () {
    Route::get('/citas-pacientes', [\App\Http\Controllers\CitaPacienteController::class, 'index']);
    Route::get('/citas-pacientes/buscar', [\App\Http\Controllers\CitaPacienteController::class, 'buscar']);
    Route::get('/citas-pacientes/{id}', [\App\Http\Controllers\CitaPacienteController::class, 'show']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor|Enfermera', 'check.permission:modificar|escribir'])->group(function () {
    Route::post('/citas-pacientes', [\App\Http\Controllers\CitaPacienteController::class, 'store']);
    Route::put('/citas-pacientes/{id}', [\App\Http\Controllers\CitaPacienteController::class, 'update']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor', 'check.permission:borrar'])->group(function () {
    Route::delete('/citas-pacientes/{id}', [\App\Http\Controllers\CitaPacienteController::class, 'destroy']);
});

Route::get('/pdf/receta', [PdfRecetaController::class, 'generar']);

// Receta Medica routes
Route::middleware(['basic.auth', 'check.role:Doctor','check.permission:ver'])->group(function () {
    Route::get('/receta-medica/uuid/{uuid}', [\App\Http\Controllers\RecetaMedicaController::class, 'showByUuid']);
});

Route::middleware(['basic.auth', 'check.role:Doctor','check.permission:escribir'])->group(function () {
    Route::post('/receta-medica', [\App\Http\Controllers\RecetaMedicaController::class, 'store']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon','check.permission:borrar'])->group(function () {
    Route::delete('/receta-medica/uuid/{uuid}', [\App\Http\Controllers\RecetaMedicaController::class, 'destroyByUuid']);
});