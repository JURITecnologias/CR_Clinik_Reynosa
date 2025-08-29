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

        return response()->json([
            'user' => $user->only(['id', 'name', 'email']),
            'roles' => $roles,
            'permissions' => $permissions,
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
});


Route::middleware('basic.auth','check.role:Main Admin|Admon|Doctor','check.permission:modificar|escribir|borrar')->group(function () {
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

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor', 'check.permission:ver'])->group(function () {
    Route::get('/doctores', [InformacionDoctorController::class, 'index']);
    Route::get('/doctores/{id}', [InformacionDoctorController::class, 'show']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor','check.permission:modificar|escribir'])->group(function () {
    Route::post('/doctores', [InformacionDoctorController::class, 'store']);
    Route::put('/doctores/{id}', [InformacionDoctorController::class, 'update']);
});

Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor', 'check.permission:borrar'])->group(function () {
    Route::delete('/doctores/{id}', [InformacionDoctorController::class, 'destroy']);
});

// Servicios medicos catalogo
Route::middleware(['basic.auth', 'check.role:Main Admin|Admon|Doctor|Enfermera|Ventas','check.permission:ver'])->group(function () {
    Route::get('/servicios-medicos', [ServicioMedicoController::class, 'index']);
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