<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class DocenteMiddleware {

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
                if($perfil->nombre == 'DOCENTE'){
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
