<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Facultad;
use App\Models\Campus;
use Request;
use Illuminate\Support\Facades\Session;
//use Illuminate\Http\Request as Request;

class FacultadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        if(Request::only(['Facultad'])){
            $request = Request::only(['Facultad','Campus']);
                if ($request['Facultad'] != '') {
                    $data_facultad = Facultad::whereNombre($request['Facultad'])->paginate(5);
                    if(count($data_facultad) > 0){
                        $data_Campus = Campus::lists('nombre', 'id');
                        return view('Administrador.Facultad.Body')->with('facultades', $data_facultad)->with('Campus', $data_Campus);
                    }
                    else
                        Session::flash('message', 'No se encontraron Facultad con el nombre de '.$request['Facultad']);
            }
        }
        $data_facultad = Facultad::paginate(5);
        $data_Campus = Campus::lists('nombre','id');
		return view('Administrador.Facultad.Body')->with('facultades', $data_facultad)->with('Campus', $data_Campus);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data_campus = Campus::lists('nombre','id');
        return view('Administrador.Facultad.Crear')->with('campus',$data_campus);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\FacultadRequest $request)
	{
        $data = $request->only(['nombre','descripcion','campus_id']);
        if(count(Facultad::whereNombre($data['nombre'])->first())== 0)
            Facultad::create($data);
        else{
            Session::flash('alert', $data['nombre'].' Ya existente en la base de datos');
            return redirect()->route('Admin.Facultad.create');
        }
        Session::flash('message', 'Facultad '.$data['nombre'].' Creada correctamente');
        return redirect()->route('Admin.Facultad.index');
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
        $Facultad = Facultad::find($id);
        $Campus = Campus::lists('nombre','id');
        return view('Administrador.Facultad.Editar')->with('Facultad',$Facultad)->with('Campus',$Campus);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\FacultadRequest $request,$id)
	{
        $Facultad = Facultad::find($id);
        if($Facultad){
            $data = $request->only(['nombre','descripcion','campus_id']);
            $Facultad->fill($data);
            $Facultad->save();
            Session::flash('message', 'Facultad '.$data['nombre'].' Editada correctamente');
            return redirect()->route('Admin.Facultad.index');

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
        $Facultad = Facultad::find($id);
        if($Facultad){
            Session::flash('destroy', 'Facultad '.$Facultad->nombre.' Eliminada correctamente');
            $Facultad->delete();
            return redirect()->route('Admin.Facultad.index');
        }
        else{
            return view('errors.404');
        }

	}

}
