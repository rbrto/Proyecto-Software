<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class RedireccionMiddleware {

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
        //dd();
		if($user->roles()->whereNombre('ADMINISTRADOR')->first()){
			return redirect()->route('Admin.home.index');
		}
		elseif ($user->roles()->whereNombre('ENCARGADO_CAMPUS')->first()){
            return redirect()->route('encar.home.index');
        }
        elseif($user->roles()->whereNombre('ESTUDIANTE')->first()){
            return redirect()->route('estu.home.index');
        }
        elseif($user->roles()->whereNombre('DOCENTE')->first()){
            //return redirect()->route('');
        }

		return $next($request);
	}

}
