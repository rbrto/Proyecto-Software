<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Rol_Usuario;
use App\Models\Rol;
use App\Models\Usuario;
use Request;
use Illuminate\Support\Facades\Session;

class AdministradorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = Rol::whereNombre('ADMINISTRADOR')->first();
        return view('Administrador.Admin.Body')->with('Adminis',$data->usuarios);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('Administrador.Admin.Crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\AdministradorRequest $request)
	{
		$data = $request->only(['nombres','apellidos','rut','email']);
        $id_administrador = Rol::whereNombre('ADMINISTRADOR')->first()->id;

        if(count(Usuario::where('rut',$data['rut'])->first()) == 0)
            Usuario::create($data);


        $rut_usuario = Usuario::where('rut',$data['rut'])->first()->rut;
        if(count(Rol_Usuario::where('usuario_rut',$data['rut'])->where('rol_id',$id_administrador)->first()) == 0){
            Rol_Usuario::create([
                'rol_id' => $id_administrador,
                'usuario_rut' => $rut_usuario
            ]);
        }
        else{
            Session::flash('alert', 'rut : '.$data['rut'].' ya esta asignado al rol ADMINISTRADOR');
            return redirect()->route('Admin.Administrador.create');
        }

        Session::flash('message', 'Usuario Creado correctamente');
        return redirect()->route('Admin.Administrador.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $usuario = Usuario::find($id);
        if($usuario){
            return view('Administrador.Admin.Editar')->with('users',$usuario);
        }
        else{
            return view('errors.404');
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\AdministradorRequest $request,$id)
	{
        $usuario = Usuario::find($id);
        if($usuario){
            if(count($usuario->roles) > 1){
                foreach($usuario->roles as $roles){
                    if($roles->nombre == "DOCENTE"){
                        $docente = Docente::where('rut',$id)->first();
                        $docente->fill($request->only(['nombres','apellidos','email']));
                        $docente->save();

                    }
                    if($roles->nombre == "ESTUDIANTE"){
                        $estudiante = Estudiante::where('rut',$id)->first();
                        $estudiante->fill($request->only(['nombres','apellidos','email']));
                        $estudiante->save();
                    }
                }
            }
            $usuario->fill($request->only(['nombres','apellidos','email']));
            $usuario->save();
            Session::flash('message', 'Usuario Editado correctamente');
            return redirect()->route('Admin.Administrador.index');
        }
        else{
            return view('errors.404');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = Usuario::find($id);
        if($usuario){
            Session::flash('message', 'Usuario '.$usuario->nombres.' Eliminado correctamente');
            $usuario->delete();
            return redirect()->route('Admin.Administrador.index');
        }
        else{
            return view('errors.404');
        }
	}

}
