<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignosVitales;

class SignosVitalesController extends Controller
{
    public function index()
    {
        return response()->json(SignosVitales::all(), 200);
    }

    public function show($id)
    {
        $signosVitales = SignosVitales::find($id);
        if (!$signosVitales) {
            return response()->json(['message' => 'Signos vitales no encontrados'], 404);
        }
        return response()->json($signosVitales, 200);
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'temperatura' => 'nullable|numeric',
            'frecuencia_cardiaca' => 'nullable|integer',
            'frecuencia_respiratoria' => 'nullable|integer',
            'presion_arterial' => 'nullable|string',
            'saturacion_oxigeno' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'talla' => 'nullable|numeric',
            'estatura' => 'nullable|numeric',
            'consulta_id' => 'required|exists:consultas,id',          
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $signosVitales = SignosVitales::create($validatedData);
        return response()->json($signosVitales, 201);
    }

    public function update(Request $request, $id)
    {
        $signosVitales = SignosVitales::find($id);
        if (!$signosVitales) {
            return response()->json(['message' => 'Signos vitales no encontrados'], 404);
        }

       $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'temperatura' => 'nullable|numeric',
            'frecuencia_cardiaca' => 'nullable|integer',
            'frecuencia_respiratoria' => 'nullable|integer',
            'presion_arterial' => 'nullable|string',
            'saturacion_oxigeno' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'talla' => 'nullable|numeric',
            'estatura' => 'nullable|numeric'         
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $signosVitales->update($validatedData);
        return response()->json($signosVitales, 200);
    }

    public function destroy($id)
    {
        $signosVitales = SignosVitales::find($id);
        if (!$signosVitales) {
            return response()->json(['message' => 'Signos vitales no encontrados'], 404);
        }

        $signosVitales->delete();
        return response()->json(['message' => 'Signos vitales eliminados'], 200);
    }
}
