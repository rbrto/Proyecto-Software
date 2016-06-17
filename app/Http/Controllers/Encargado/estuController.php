<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Rol_Usuario;
//use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Campus;


class estuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$estu = Estudiante::paginate();
	    $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
        $estu=Estudiante::join('carreras','estudiantes.carrera_id','=','carreras.id')
                     ->join('escuelas','carreras.escuela_id','=','escuelas.id')
                     ->join('departamentos','escuelas.departamento_id','=','departamentos.id')
			         ->join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus) 
			          ->select('estudiantes.*') 
			          ->paginate();
			          //dd($estu);
  		return view('Encargado.modificarEstu',compact('estu','nombreCampus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//$carreras= Carrera::lists('nombre','id');	
		$rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
        $carreras=Carrera::join('escuelas','carreras.escuela_id','=','escuelas.id')
                     ->join('departamentos','escuelas.departamento_id','=','departamentos.id')
			         ->join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus) 
			          ->select('carreras.*') 
			          ->lists('nombre','id');	
		return view('Encargado.agregarEstu',compact('carreras'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data= Request::only(['nombres','apellidos','rut','email','carrera_id']);   
		$rules=array(
			'nombres' => 'required|between:3,25|alpha_space',
			'apellidos' => 'required|between:3,25|alpha_space',
			'rut'=> 'required|numeric|unique:estudiantes',
			'email'=> 'required|email'
			
 		);
      
        
 		$val=Validator::make($data,$rules);	

 		if($val->fails())
 		{
            return redirect()->back()
            ->withErrors($val->errors())
            ->withInput();
 		}	
 		$usuario=Request::only(['nombres','apellidos','rut','email']);	
        $usuario_rut=Request::get('rut');
        $estu = Estudiante::create($data);
        $usua= Usuario::create($usuario);
        $estu->save();
        $usua->save();
         $rol_usuario=Rol_Usuario::create(['usuario_rut'=> $usuario_rut,'rol_id'=>3]);

        $rol_usuario->save();
        return redirect('encar/estu/modi');
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
		$estu=Estudiante::findOrFail($id);
		$carre=Carrera::lists('nombre','id');
		return view('Encargado.editarEstu', compact('estu','carre'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$estu= Estudiante::findOrFail($id);
		$estu->fill(Request::all());
		$estu->save();
		return redirect('encar/estu/modi');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$estu= Estudiante::findOrFail($id);
		$estu->delete();
		return redirect('encar/estu/modi');
	}

}
