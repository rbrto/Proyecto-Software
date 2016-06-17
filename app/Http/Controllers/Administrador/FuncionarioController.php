<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Departamento;



use Illuminate\Support\Facades\Session;

use Request;

class FuncionarioController extends Controller {

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
                $funcionario = Funcionario::where('rut',$request['rut'])->paginate(1);
                if(count($funcionario) > 0)
                    return view('Administrador.Funcionario.Body')->with('Funcionarios',$funcionario);
                else
                    Session::flash('message', 'RUT: '.$request['rut'].' No encontrado');
            }
        }
		$funcionario = Funcionario::paginate(5);
        return view('Administrador.Funcionario.Body')->with('Funcionarios',$funcionario);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $departamento = Departamento::lists('nombre','id');
        return view('Administrador.Funcionario.Crear')->with('depto',$departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\FuncionarioRequest $request)
	{
		$data = $request->only(['nombres','apellidos','rut','email','departamentos']);
        if(count(Funcionario::where('rut',$data['rut'])->first()) == 0){
            Funcionario::create([
                'nombres'           => $data['nombres'],
                'apellidos'         => $data['apellidos'],
                'rut'               => $data['rut'],
                'email'             => $data['email'],
                'departamento_id'   => (integer)$data['departamentos'],
            ]);

            Session::flash('message', 'Funcionario '.$data['nombres'].'Creado correctamente');
        }
        else{
            Session::flash('alert', 'Usuario actualmente creado');
            return redirect()->route('Admin.Funcionario.create');
        }
        return redirect()->route('Admin.Funcionario.index');
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
		$funcionario = Funcionario::find($id);
        if($funcionario){
            $departamento = Departamento::lists('nombre','id');
            return view('Administrador.Funcionario.Editar')->with('funcionario',$funcionario)->with('depto',$departamento);
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
	public function update(Requests\FuncionarioRequest $request,$id)
	{
        $funcionario = Funcionario::find($id);
        if($funcionario){
            $data = $request->only(['nombres','apellidos','email','departamentos']);
            //dd($data);
            $funcionario->fill([
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'email' => $data['email'],
                'departamento_id' => (integer)$data['departamentos'],
            ]);
            $funcionario->save();
            Session::flash('message', 'Funcionario '.$data['nombres'].' Editado correctamente');
            return redirect()->route('Admin.Funcionario.index');
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
		$funcionario = Funcionario::find($id);
        if($funcionario){
            Session::flash('destroy', 'Funcionario '.$funcionario->nombres.' Borrado correctamente');
            $funcionario->delete();
            return redirect()->route('Admin.Funcionario.index');
        }
        else{
            return view('errors.404');
        }
	}

}
