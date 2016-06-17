<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Usuario;

use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Guard as Auth;

class AuthController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function getLogin()
    {
        return view('Login.login');
    }

    public function postLogin(Request $request)
    {
        $credenciales = $request->only(['rut', 'password']);
        $rules = [ // Reglas de validacion TODO: validar rut
            'rut' => 'required|rut',
            'password' => 'required'
        ];

        $this->validate($request, $rules); // Valida que se envien ambos parametros
        //dd($this->auth->attempt($credenciales, $request->has('remember')));

        if($this->auth->attempt($credenciales, $request->has('remember')))
        { // Login exitoso
            return redirect()->route('home');
        }

        return redirect()->route('auth.login')
            ->withInput($request->only(['rut', 'remember']))
            ->withErrors(['rut' => 'Sus credenciales no son válidas, intente nuevamente!']);
    }

    public function getLogout()
    {
        $this->auth->logout();
        return redirect()->route('auth.login')
            ->with('message', 'Ha salido correctamente');
    }
}
