<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->is('permissions') || $request->is('permissions/create') || $request->is('permissions/*')) {
            if (!Auth::user()->hasPermissionTo('Manage Permissions')){
                abort('401');
            }
        }        

        if ($request->is('roles') || $request->is('roles/create') || $request->is('roles/*')) {
            if (!Auth::user()->hasPermissionTo('Manage Roles')){
                abort('401');
            }
        }

        if ($request->is('users') || $request->is('users/create') || $request->is('users/*')) {
            if (!Auth::user()->hasPermissionTo('Manage Users')){
                abort('401');
            }
        }

        return $next($request);
    }
}