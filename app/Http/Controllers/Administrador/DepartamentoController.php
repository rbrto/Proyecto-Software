<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Facultad;
use App\Models\Departamento;
use Request;
use Illuminate\Support\Facades\Session;

//use Illuminate\Http\Request;

class DepartamentoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Request::all()){
            $request = Request::only(['nombre']);
            if($request['nombre'] != ''){
                $data_depto = Departamento::whereNombre($request['nombre'])->paginate(5);
                $data_Facultad = Facultad::lists('nombre','id');
                if(count($data_depto) > 0){
                    return view('Administrador.Departamento.Body')->with('Departamentos', $data_depto)->with('Facultad', $data_Facultad);
                }
                else{
                    Session::flash('message', 'No se encontraron Departamento con el nombre de '.$request['nombre']);
                }
            }
        }
        $data_depto = Departamento::paginate(5);
        $data_Facultad = Facultad::lists('nombre','id');
        return view('Administrador.Departamento.Body')->with('Departamentos', $data_depto)->with('Facultad', $data_Facultad);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_Facultad = Facultad::lists('nombre','id');
        return view('Administrador.Departamento.Crear')->with('Facultad',$data_Facultad);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\DepartamentoRequest $request)
	{
        $data = $request->only(['nombre','descripcion','facultad_id']);
        if(count(Departamento::whereNombre($data['nombre'])->first()) == 0){
            Departamento::create($data);
        }
        else{
            if(Departamento::whereNombre($data['nombre'])->first()->facultad->id != $data['facultad_id']){
                Departamento::create($data);
            }
            else{
                Session::flash('alert', 'Departamento: '.$data['nombre'].' Pertenciente a la Facultad: '.Facultad::find($data['facultad_id'])->nombre.' Ya existente en la base de datos');
                return redirect()->route('Admin.Depto.create');
            }
        }
        Session::flash('message', 'Departamento: '.$data['nombre'].' Pertenciente a la Facultad: '.Facultad::find($data['facultad_id'])->nombre.' Creado exitosamente');
        return redirect()->route('Admin.Depto.index');
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
        $Departamento = Departamento::find($id);
        if($Departamento){
            $Facultad = Facultad::lists('nombre','id');
            return view('Administrador.Departamento.Editar')->with('Departamento',$Departamento)->with('Facultad',$Facultad);
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
	public function update(Requests\DepartamentoRequest $request,$id)
	{
        $Departamento = Departamento::find($id);
        if($Departamento){
            $data = $request->only(['nombre','descripcion','facultad_id']);
            $Departamento->fill($data);
            $Departamento->save();
            Session::flash('message', 'Departamento '.$data['nombre'].' Editado correctamente');
            return redirect()->route('Admin.Depto.index');

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
        $Departamento = Departamento::find($id);
        if($Departamento){
            Session::flash('destroy', 'Departamento '.$Departamento->nombre.' Eliminado correctamente');
            $Departamento->delete();
            return redirect()->route('Admin.Depto.index');
        }
        else{
            return view('errors.404');
        }

	}

}
