<?php

// app/Http/Middleware/CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = $request->authenticated_user;

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userRoles = $user->roles()->pluck('name');

        $requiredRoles = explode('|', $role);

        if (!$userRoles->intersect($requiredRoles)->count()) {
            return response()->json(['error' => 'Forbidden: insufficient role'], 403);
        }

        return $next($request);
    }
}