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
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Decode and validate credentials format: base64("username:password")
        $encodedCredentials = trim(substr($authHeader, 6));
        $decoded = base64_decode($encodedCredentials, true);

        if ($decoded === false || !str_contains($decoded, ':')) {
            return response()->json(['message' => 'Invalid credentials format'], 401);
        }

        [$username, $password] = explode(':', $decoded, 2);

        if ($username === '' || $password === '') {
            return response()->json(['message' => 'Invalid credentials format'], 401);
        }

        $user = User::where('name', $username)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Opcional: puedes adjuntar el usuario al request
        $request->merge(['authenticated_user' => $user]);

        return $next($request);
    }



}
