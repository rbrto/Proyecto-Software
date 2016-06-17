<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Support\Facades\Session;
use Request;

class EstudianteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Request::only(['rut'])){
            $request = Request::only(['rut']);
            if($request['rut'] != null){
                $estudiante = Estudiante::where('rut',$request['rut'])->paginate(1);
                if(count($estudiante) > 0)
                    return view('Administrador.Estudiante.Body')->with('Estudiantes',$estudiante);
                else
                    Session::flash('message', 'RUT: '.$request['rut'].' No encontrado');
            }
        }
        $estudiante = Estudiante::paginate(5);
        return view('Administrador.Estudiante.Body')->with('Estudiantes',$estudiante);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $carrera = Carrera::lists('nombre','id');
		return view('Administrador.Estudiante.Crear')->with('Carreras', $carrera);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\EstudianteRequest $request)
	{
		$data = $request->only(['nombres','apellidos','rut','email']);
        $estudiante = $request->only(['nombres','apellidos','rut','email','carrera']);
        $id_estudiante = Rol::whereNombre('ESTUDIANTE')->first()->id;

        if(count(Usuario::where('rut',$data['rut'])->first()) == 0){
            Session::flash('message', 'Usuario '.$data['nombres'].' Creado correctamente');
            Usuario::create($data);
        }

        if(count(Estudiante::where('rut',$estudiante['rut'])->first())== 0){
            Estudiante::create([
                'nombres' => $estudiante['nombres'],
                'apellidos' => $estudiante['apellidos'],
                'rut' => (integer)$estudiante['rut'],
                'email' => $estudiante['email'],
                'carrera_id' => (integer)$estudiante['carrera']
            ]);
            Session::flash('message', 'Usuario '.$data['nombres'].' Creado correctamente');
        }

        if(count(Usuario::where('rut',$data['rut'])->first()->roles()->whereNombre('ESTUDIANTE')->first())== 0){
            Rol_Usuario::create([
                'usuario_rut' => $data['rut'],
                'rol_id' => $id_estudiante
            ]);
            Session::flash('message', 'Usuario '.$data['nombres'].' Creado correctamente');
        }
        else{
            Session::flash('alert', 'Usuario actualmente creado');
            return redirect()->route('Admin.Estudiante.create');
        }
        return redirect()->route('Admin.Estudiante.index');

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
        $estudiante = Estudiante::find($id);
        if($estudiante){
            $carrera = Carrera::lists('nombre','id');
            return view('Administrador.Estudiante.Editar')->with('estudiante',$estudiante)->with('Carreras', $carrera);
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
	public function update(Requests\EstudianteRequest $request,$id)
	{
        $estudiante = Estudiante::find($id);
        if($estudiante){
            //NO VOY A TOCAR EL RUT
            $datos = Request::only(['nombres','apellidos','email','carrera']);
            $estudiante->fill([
                'nombres' => $datos['nombres'],
                'apellidos' => $datos['apellidos'],
                'email' => $datos['email'],
                'carrera_id' => $datos['carrera'],
            ]);
            $estudiante->save();

            $rut = $request->only(['estudiante_rut']);
            $usuario = Usuario::where('rut',$rut)->first();
            $usuario->fill([
                'nombres' => $datos['nombres'],
                'apellidos' => $datos['apellidos'],
                'email' => $datos['email'],
            ]);
            $usuario->save();

            Session::flash('message', 'Usuario '.$datos['nombres'].' Editado correctamente');
            return redirect()->route('Admin.Estudiante.index');
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
		$estudiante = Estudiante::find($id);
        if($estudiante){
            $usuario = Usuario::find($estudiante->rut);
            if($usuario){
                Session::flash('destroy', 'Estudiante '.$estudiante->nombres.' Eliminado correctamente');
                $usuario->delete();
                $estudiante->delete();
                return redirect()->route('Admin.Estudiante.index');
            }
            else {
                return view('errors.404');
            }
        }
        else{
            return view('errors.404');
        }

    }

}
