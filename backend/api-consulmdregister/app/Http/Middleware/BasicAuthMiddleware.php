<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BasicAuthMiddleware
{
   public function handle(Request $request, Closure $next)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Basic ')) {
            return response()->json(['message' => 'Unauthorized'], 401)
                             ->header('WWW-Authenticate', 'Basic realm="API Access"');
        }

        // Decodificar credenciales
        $encodedCredentials = substr($authHeader, 6);
        $decoded = base64_decode($encodedCredentials);
        [$user, $password] = explode(':', $decoded, 2);

        $user = User::where('name', $user)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Opcional: puedes adjuntar el usuario al request
        $request->merge(['authenticated_user' => $user]);

        return $next($request);
    }



}
