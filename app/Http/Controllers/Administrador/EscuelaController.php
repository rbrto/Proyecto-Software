<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Escuela;
use Request;

use Illuminate\Support\Facades\Session;

//use Illuminate\Http\Request;

class EscuelaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Request::only(['Escuela'])){
            $request = Request::only(['Escuela','Departamento']);
            if($request['Escuela'] != ''){
                $data_escuela = Escuela::whereNombre($request['Escuela'])->paginate(5);
                $data_Depto = Departamento::lists('nombre','id');
                if(count($data_escuela) > 0){
                    return view('Administrador.Escuela.Body')->with('Escuelas', $data_escuela)->with('Depto', $data_Depto);
                }
                else{
                    Session::flash('message', 'No se encontraron Escuela con el nombre de '.$request['Escuela']);
                }
            }
        }
        $data_escuela = Escuela::paginate(5);
        $data_Depto = Departamento::lists('nombre','id');
        return view('Administrador.Escuela.Body')->with('Escuelas', $data_escuela)->with('Depto', $data_Depto);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_departamento = Departamento::lists('nombre','id');
        return view('Administrador.Escuela.Crear')->with('Departamento',$data_departamento);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\EscuelaRequest $request)
	{
        $data = $request->only(['nombre','descripcion','departamento_id']);
        if(count(Escuela::whereNombre($data['nombre'])->first()) == 0){
            Escuela::create($data);
        }
        else{
            if(Escuela::whereNombre($data['nombre'])->first()->departamento->id != $data['departamento_id']){
                Escuela::create($data);
            }
            else{
                Session::flash('alert', 'Escuela: '.$data['nombre'].' Perteneciente al departamento'.Departamento::find($data['departamento_id'])->nombre.' Ya existente en la base de datos');
                return redirect()->route('Admin.Escuela.create');
            }
        }
        Session::flash('message', 'Escuela: '.$data['nombre'].' Perteneciente al departamento'.Departamento::find($data['departamento_id'])->nombre.' Creado exitosamente');
        return redirect()->route('Admin.Escuela.index');
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
        $Escuela = Escuela::find($id);
        if($Escuela){
            $Departamento = Departamento::lists('nombre','id');
            return view('Administrador.Escuela.Editar')->with('Escuela',$Escuela)->with('Departamento',$Departamento);
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
	public function update(Requests\EscuelaRequest $request,$id)
	{
        $Escuela = Escuela::find($id);
        if($Escuela){
            $data = $request->only(['nombre','descripcion','departamento_id']);
            $Escuela->fill($data);
            $Escuela->save();
            Session::flash('message', 'Escuela '.$data['nombre'].' Editado correctamente');
            return redirect()->route('Admin.Escuela.index');

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
        $Escuela = Escuela::find($id);
        if($Escuela){
            Session::flash('destroy', 'Escuela '.$Escuela->nombre.' Eliminado correctamente');
            $Escuela->delete();
            return redirect()->route('Admin.Escuela.index');
        }
        else{
            return view('errors.404');
        }
	}

}
