<?php
    namespace App\Http\Controllers;

    use App\Models\KitConsumible;
    use App\Models\KitPredefinido;
    use App\Models\Consumible;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class KitConsumibleController extends Controller
    {
    // Agregar varios consumibles a un kit
    public function storeMultiple(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kit_id' => 'required|exists:kits_predefinidos,id',
            'consumibles' => 'required|array|min:1',
            'consumibles.*.consumible_id' => 'required|exists:consumibles,id',
            'consumibles.*.cantidad' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        $kit_id = $data['kit_id'];
        $result = [];
        foreach ($data['consumibles'] as $item) {
            $exists = KitConsumible::where('kit_id', $kit_id)
                ->where('consumible_id', $item['consumible_id'])
                ->first();
            if ($exists) {
                continue; // O puedes actualizar la cantidad si lo prefieres
            }
            $result[] = KitConsumible::create([
                'kit_id' => $kit_id,
                'consumible_id' => $item['consumible_id'],
                'cantidad' => $item['cantidad'],
            ]);
        }
        return response()->json(['added' => $result], 201);
    }
    // Listar consumibles de un kit
    public function index(Request $request)
    {
        $kitId = $request->query('kit_id');
        $consumibleId = $request->query('consumible_id');
        $query = KitConsumible::with(['kit', 'consumible']);
        
        if ($kitId) {
            $query->where('kit_id', $kitId);
        }
        
        if ($consumibleId) {
            $query->where('consumible_id', $consumibleId);
        }
        
        return $query->paginate($request->query('per_page', 15));
    }

    // Agregar consumible a un kit
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kit_id' => 'required|exists:kits_predefinidos,id',
            'consumible_id' => 'required|exists:consumibles,id',
            'cantidad' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        // Evitar duplicados
        $exists = KitConsumible::where('kit_id', $data['kit_id'])
            ->where('consumible_id', $data['consumible_id'])
            ->first();
        if ($exists) {
            return response()->json(['message' => 'El consumible ya está asignado a este kit.'], 409);
        }
        $kitConsumible = KitConsumible::create($data);
        return response()->json($kitConsumible->load(['kit', 'consumible']), 201);
    }

    // Mostrar un registro específico
    public function show($id)
    {
        $kitConsumible = KitConsumible::with(['kit', 'consumible'])->findOrFail($id);
        return response()->json($kitConsumible);
    }

    // Actualizar cantidad de un consumible en un kit
    public function update(Request $request, $id)
    {
        $kitConsumible = KitConsumible::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'cantidad' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $kitConsumible->update($validator->validated());
        return response()->json($kitConsumible->load(['kit', 'consumible']));
    }

    // Eliminar consumible de un kit
    public function destroy($id)
    {
        $kitConsumible = KitConsumible::findOrFail($id);
        $kitConsumible->delete();
        return response()->json(['message' => 'Consumible eliminado del kit']);
    }
}
