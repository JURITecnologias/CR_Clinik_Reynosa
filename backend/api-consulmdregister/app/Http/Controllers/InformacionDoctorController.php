<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformacionDoctor;

class InformacionDoctorController extends Controller
{
    public function index()
    {
        return InformacionDoctor::with('user')->get(); // solo activos
    }

    public function indexConEliminados()
    {
        return InformacionDoctor::with('user')->withTrashed()->get(); // todos
    }

    public function soloEliminados()
    {
        return InformacionDoctor::with('user')->onlyTrashed()->get(); // solo eliminados
    }

    public function show($id)
    {
        return InformacionDoctor::with('user')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firma' => 'nullable|string',
        ]);

        $doctor = InformacionDoctor::create($request->all());
        return response()->json($doctor, 201);
    }

    public function update(Request $request, $id)
    {
        $doctor = InformacionDoctor::findOrFail($id);
        $doctor->update($request->all());
        return response()->json($doctor);
    }

    public function destroy($id)
    {
        $doctor = InformacionDoctor::findOrFail($id);
        $doctor->delete(); // soft delete
        return response()->json(['mensaje' => 'Doctor eliminado (soft delete)']);
    }

    public function restore($id)
    {
        $doctor = InformacionDoctor::withTrashed()->findOrFail($id);

        if ($doctor->trashed()) {
            $doctor->restore();
            return response()->json(['mensaje' => 'Doctor restaurado']);
        }

        return response()->json(['mensaje' => 'El doctor no estaba eliminado'], 400);
    }

    public function buscarPorEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $doctor = InformacionDoctor::with('user')->whereHas('user', function($query) use ($request) {
            $query->where('email', $request->email);
        })->first();

        if (!$doctor) {
            return response()->json(['mensaje' => 'Doctor no encontrado'], 404);
        }

        return response()->json($doctor);
    }

    public function subirFirma(Request $request, $id)
    {
        $request->validate([
            'firma' => 'nullable|string'
        ]);

        $doctor = InformacionDoctor::findOrFail($id);
        $doctor->firma = $request->firma;
        $doctor->save();

        return response()->json(['mensaje' => 'Firma actualizada', 'doctor' => $doctor]);
    }
}