<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;

use Auth;

class EstudianteMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $user = Auth::user();
        if($user){
            foreach($user->roles as $perfil){
                if($perfil->nombre == 'ESTUDIANTE'){
                    return $next($request);
                }
            }
            return redirect()->route('auth.login');
        }
        else{
            return redirect()->route('auth.login');
        }
        return $next($request);
	}

}
