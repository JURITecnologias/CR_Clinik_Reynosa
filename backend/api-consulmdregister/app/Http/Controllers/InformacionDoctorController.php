<?php

// app/Http/Controllers/InformacionDoctorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformacionDoctor;

class InformacionDoctorController extends Controller
{
    public function index()
    {
        return InformacionDoctor::with('user')->get();
    }

    public function show($id)
    {
        return InformacionDoctor::with('user')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firma' => 'nullable|string', // puedes agregar validaciones más estrictas si lo deseas
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
        InformacionDoctor::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Información del doctor eliminada']);
    }
}
