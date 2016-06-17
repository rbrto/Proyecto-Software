<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tipo_Sala;
use Request;

use Illuminate\Support\Facades\Session;
//use Illuminate\Http\Request;

class TipoSalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Request::only(['TpoSala'])){
            $request = Request::only(['TpoSala']);
            if ($request['TpoSala'] != '') {
                $data = Tipo_Sala::whereNombre(Request::only(['TpoSala']))->paginate(5);
                if(count($data) > 0){
                    return view('Administrador.TpoSala.Body')->with('Tposalas', $data);
                }
                else
                    Session::flash('message', 'No se encontraron Tipo de sala con el nombre de '.$request['TpoSala']);
            }
        }
        $data = Tipo_Sala::paginate(5);
        return view('Administrador.TpoSala.Body')->with('Tposalas', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('Administrador.TpoSala.Crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\TposalaRequest $request)
	{
        $data = $request->only(['nombre','descripcion']);
        if(count(Tipo_Sala::whereNombre($data['nombre'])->first()) == 0){
            Tipo_Sala::create($data);
        }
        else{
            Session::flash('alert', 'Tipo de sala : '.$data['nombre'].' Ya existente en la base de datos');
            return redirect()->route('Admin.TpoSala.create');
        }

        return redirect()->route('Admin.TpoSala.index');
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
		$TpoSalas = Tipo_Sala::find($id);
        if($TpoSalas){
            return view('Administrador.TpoSala.Editar')->with('TpoSalas', $TpoSalas);
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
	public function update(Requests\TposalaRequest $request,$id)
	{
        $TpoSalas = Tipo_Sala::find($id);
        if($TpoSalas){
            $data = $request->only(['nombre','descripcion']);
            $TpoSalas->fill($data);
            $TpoSalas->save();
            Session::flash('message', 'Tipo de sala '.$data['nombre'].' Editado correctamente');
            return redirect()->route('Admin.TpoSala.index')->with('mensaje','Campus editado correctamente');
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
        $TpoSalas = Tipo_Sala::find($id);
        if($TpoSalas){
            Session::flash('destroy', 'Tipo de sala '.$TpoSalas->nombre.' Eliminado correctamente');
            $TpoSalas->delete();
            return redirect()->route('Admin.TpoSala.index')->with('mensaje','Campus eliminado correctamente');
	    }
        else{
            return view('errors.404');
        }
    }

}
