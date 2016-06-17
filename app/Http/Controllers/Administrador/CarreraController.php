<?php namespace App\Http\Controllers\Administrador;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\Escuela;
use Illuminate\Support\Facades\Session;
use Request;

class CarreraController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        if(Request::only(['Carrera'])){
            $request = Request::only(['Carrera']);
            if($request['Carrera'] != ''){
                $data = Carrera::whereNombre($request['Escuela'])->paginate(5);
                if(count($data) > 0){
                    return view('Administrador.Carrera.Body')->with('Carreras',$data);
                }
                else{
                    Session::flash('message', 'No se encontraron Carrera con el nombre de '.$request['Carrera']);
                }
            }
        }
        $data = Carrera::paginate();
		return view('Administrador.Carrera.Body')->with('Carreras',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = Escuela::lists('nombre','id');
		return view('Administrador.Carrera.Crear')->with('Escuela',$data);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CarreraRequest $request)
	{
		//dd($request->all());
        $data = $request->only(['nombre','codigo','escuela','descripcion']);
        if(count(Carrera::whereNombre($data['nombre'])->first()) == 0){
            Carrera::create([
                'nombre'         => $data['nombre'],
                'codigo'        => $data['codigo'],
                'escuela_id'    => $data['escuela'],
                'descripcion'   => $data['descripcion']
            ]);
        }
        else{
            Session::flash('alert', $data['nombre'].' Ya existente en la base de datos');
            return redirect()->route('Admin.Carrera.create');
        }
        Session::flash('message', 'Carrera '.$data['nombre'].' Creada correctamente');
        return redirect()->route('Admin.Carrera.index');

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
		$carrera = Carrera::find($id);
        if($carrera){
            $data = Escuela::lists('nombre','id');
            return view('Administrador.Carrera.Editar')->with('Escuela',$data)->with('Carrera', $carrera);
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
	public function update(Requests\CarreraRequest $request,$id)
	{
		$carrera = Carrera::find($id);
        if($carrera){
            $data = $request->only(['nombre','codigo','escuela','descripcion']);
            $carrera->fill([
                'nombre'         => $data['nombre'],
                'codigo'        => $data['codigo'],
                'escuela_id'    => $data['escuela'],
                'descripcion'   => $data['descripcion']
            ]);
            $carrera->save();
            Session::flash('message', 'Carrera '.$data['nombre'].' Editada correctamente');
            return redirect()->route('Admin.Carrera.index');
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
		$carrera = Carrera::find($id);
        if($carrera){
            Session::flash('destroy', 'Carrera '.$carrera->nombre.' Eliminada correctamente');
            $carrera->delete();
            return redirect()->route('Admin.Carrera.index');
        }
        else{
            return view('errors.404');
        }
	}

}
