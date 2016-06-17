<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Sala;
use App\Models\Tipo_Sala;
use Request;

use Illuminate\Support\Facades\Session;

//use Illuminate\Http\Request;

class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        if(Request::only(['Sala'])){
            $request = Request::only(['Sala']);
            if ($request['Sala'] != '') {
                $data = Sala::whereNombre(Request::only(['Sala']))->paginate(5);
                if(count($data) > 0){
                    return view('Administrador.Sala.Body')->with('Salas',$data);
                }
                else
                    Session::flash('message', 'No se encontraron Salas con el nombre de '.$request['TpoSala']);
            }
        }
        $data = Sala::paginate(5);
        return view('Administrador.Sala.Body')->with('Salas',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_campus = Campus::lists('nombre','id');
        $data_tposala = Tipo_Sala::lists('nombre','id');

        return view('Administrador.Sala.Crear')->with('Campus',$data_campus)->with('Tposala',$data_tposala);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\SalaRequest $request)
	{
		$data = $request->only(['nombre','capacidad','descripcion','campus_id','tipo_sala_id']);
        if(count(Sala::whereNombre($data['nombre'])->first()) == 0){
            Sala::create($data);
        }
        else{
            Session::flash('alert', 'Sala: '.$data['nombre'].'Ya existente en la base de datos');
            return redirect()->route('Admin.Salas.create');
        }

        return redirect()->route('Admin.Salas.index');
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
        $Salas = Sala::find($id);
        $data_campus = Campus::lists('nombre','id');
        $data_tposala = Tipo_Sala::lists('nombre','id');
        return view('Administrador.Sala.Editar')->with('Salas',$Salas)->with('Campus',$data_campus)->with('Tposala',$data_tposala);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\SalaRequest $request,$id)
	{
        $Salas = Sala::find($id);
        if($Salas){
            $data = $request->only(['nombre','descripcion','campus_id','tipo_sala_id']);
            $Salas->fill($data);
            $Salas->save();
            Session::flash('message', 'Sala '.$data['nombre'].' Editado correctamente');
            return redirect()->route('Admin.Salas.index');
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
        $Salas = Sala::find($id);
        if($Salas){
            Session::flash('destroy', 'Sala '.$Salas->nombre.' Eliminado correctamente');
            $Salas->delete();
            return redirect()->route('Admin.Salas.index')->with('mensaje','Campus eliminado correctamente');
        }
        else
            return view('errors.404');
	}

}
