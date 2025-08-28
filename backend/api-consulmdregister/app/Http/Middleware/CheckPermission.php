<?php

// app/Http/Middleware/CheckPermission.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = $request->authenticated_user;

        $userPermissions = $user->roles()
            ->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name')
            ->unique();

        $required = explode('|', $permission);
        if (!$userPermissions->intersect($required)->count()) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}