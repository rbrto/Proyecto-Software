<?php namespace App\Http\Controllers\Login;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Usuario;
use App\Models\Rol_Usuario;
use App\Models\Rol;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class LoginEncarController extends Controller {

    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * The registrar implementation.
     *
     * @var \Illuminate\Contracts\Auth\Registrar
     */
    protected $registrar;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        //
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        /*
        $validator = $this->registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->auth->login($this->registrar->create($request->all()));

        return redirect($this->redirectPath());*/
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('Login.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function postLogin(Request $request)
    {
        $this->validate($request, [
           'rut' => 'required', //FALTA AGREGAR OTROS VALIDADORES
           'password' => 'required',
        ]);

        $credentials = $request->only('rut', 'password');

        //dd(Auth::attempt(['rut' => '17860032-K', 'password' => '']));
        //dd(Auth::attempt(['rut' => $credentials['rut'], 'password' => strtoupper($credentials['password'])]));
        if(Auth::attempt(['rut' => $credentials['rut'], 'password' => strtoupper($credentials['password'])])){
            
                $id_encar = Rol::where('nombre','=','Encargado Campus')->first();
                $query = Rol_Usuario::where('usuario_rut','=',$credentials['rut'])->first();

                if($query->rol_id == $id_encar->id)
                    return redirect()->intended($this->redirectPath());

            

        }

        return redirect($this->loginPath())
           ->withInput($request->except('password'))
           ->withErrors([
               'rut' => $this->getFailedLoginMessage(),
           ]);

    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'Su RUT o su contraseña son incorrectos';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        //Auth::logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');

    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : 'encar/home';

    }


    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : 'encar/login';
    }



}
