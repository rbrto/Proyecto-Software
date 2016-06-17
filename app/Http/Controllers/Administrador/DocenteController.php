<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\Rol_Usuario;
use App\Models\Docente;
use App\Models\Departamento;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;

use Request;

class DocenteController extends Controller {

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
                $docente = Docente::where('rut',$request['rut'])->paginate(1);
                if(count($docente) > 0)
                    return view('Administrador.Docente.Body')->with('Docentes',$docente);
                else
                    Session::flash('message', 'RUT: '.$request['rut'].' No encontrado');
            }
        }
        $docente = Docente::paginate(5);
		return view('Administrador.Docente.Body')->with('Docentes',$docente);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $departamento = Departamento::lists('nombre','id');
        return view('Administrador.Docente.Crear')->with('depto',$departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\DocenteRequest $request)
	{
        $data = $request->only('nombres','apellidos','email','departamentos','rut');
        $id_departamento = Departamento::where('id',$request->only(['departamentos']))->first()->id;
        //dd($data);

        if(count(Usuario::where('rut',$data['rut'])->first()) == 0){
                Usuario::create([
                    'rut' => (integer)$data['rut'],
                    'nombres' => $data['nombres'],
                    'apellidos' => $data['apellidos'],
                    'email' => $data['email'],
                ]);
            Session::flash('message', 'Usuario Creado correctamente');
        }
        if(count(Docente::where('rut',$data['rut'])->first()) == 0){
            Docente::create([
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'email' => $data['email'],
                'rut' => (integer)$data['rut'],
                'departamento_id' => (integer)$data['departamentos']
            ]);
            Session::flash('message', 'Usuario Creado correctamente');
        }

        if(count(Usuario::where('rut',$data['rut'])->first()->roles()->whereNombre('DOCENTE')->first())== 0){
            Rol_Usuario::create([
                'rol_id' => $id_departamento,
                'usuario_rut' => (integer)$data['rut'],
            ]);
            Session::flash('message', 'Usuario Creado correctamente');
        }
        else{
            Session::flash('alert', 'RUT: '.$data['rut'].' ya es un DOCENTE');
            return redirect()->route('Admin.Docente.create');
        }
        return redirect()->route('Admin.Docente.index');
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
		$docente = Docente::find($id);
        if($docente){
            $departamento = Departamento::lists('nombre','id');
            return view('Administrador.Docente.Editar')->with('docente',$docente)->with('depto',$departamento);
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
	public function update(Requests\DocenteRequest $request,$id)
	{
		$docente = Docente::find($id);
        if($docente){
            $data = $request->only(['nombres','apellidos','email','departamentos']);
            $rut = $request->only(['docente_rut']);

            $usuario = Usuario::where('rut',$rut)->first();

            $usuario->fill([
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'email' => $data['email'],
            ]);
            $usuario->save();

            $docente->fill([
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'email' => $data['email'],
                'departamento_id' => $data['departamentos'],
            ]);
            $docente->save();

            Session::flash('message', 'Usuario '.$data['nombres'].' editado correctamente');
            return redirect()->route('Admin.Docente.index');
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
		$docente = Docente::find($id);
        if($docente){
            $usuario = Usuario::find($docente->rut);
            if($usuario){
                Session::flash('destroy', 'Docente: '.$docente->nombres.' eliminado correctamente');
                $usuario->delete();
                $docente->delete();
                return redirect()->route('Admin.Docente.index');
            }
            else{
                return view('errors.404');
            }
        }
        else {
            return view('errors.404');
        }
	}

}
