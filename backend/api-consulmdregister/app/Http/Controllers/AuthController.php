<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        $roles = $user->roles()->pluck('name');
        $permissions = $user->permissions();

        return response()->json([
            'user' => $user->only(['id', 'name', 'email']),
            'roles' => $roles,
            'permissions' => $permissions,
            'token' =>base64_encode($user->name.':'.$request->password),
        ]);
    }
}
