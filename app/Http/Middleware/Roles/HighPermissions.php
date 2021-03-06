<?php

namespace App\Http\Middleware\Roles;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;

class HighPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $role = getUserRole($user);

        // Aquí se puede mejorar trayendo los datos de la base de datos
        if($role == 'Administrador' || 
           $role == 'Jefe Posgrado' || 
           $role == 'Coordinador' || 
           $role == 'Asistente Coordinador') 
        {
            return $next($request);
        } else {
            return redirect('dashboard');
        }
    }
}
