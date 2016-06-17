<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\Campus;
use App\Models\Usuario;
use App\Models\Rol_Usuario;
//use Illuminate\Http\Request;
use App\Models\Departamento;
use Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;




class DocenteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$docentes=Docente::paginate();
		$rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
        $docentes=Docente::join('departamentos','docentes.departamento_id','=','departamentos.id')
			         ->join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus) 
			          ->select('docentes.*') 
			          ->paginate();
        return view('Encargado.modificarDoce',compact('docentes','nombreCampus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//$depa=Departamento::lists('nombre','id');
        $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
        $depa=Departamento::join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus) 
			          ->select('departamentos.*') 
			          ->lists('nombre','id');
		return view('Encargado.agregarDoce',compact('depa'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{  

		$data= Request::only(['nombres','apellidos','rut','departamento_id','email']);
		//dd(count(Docente::where('rut',Request::get('rut'))));  
		$rules=array(
            		 'nombres' => 'required|max:25|alpha_space',
                     'apellidos' => 'required|max:25|alpha_space',
                     'rut' => 'required|numeric|unique:docentes',
                     'departamento_id' => 'required'
			
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
        $usua= Usuario::create($usuario);
        $doce = Docente::create($data);
        $usua->save();		 
        $doce->save();
        
        $rol_usuario=Rol_Usuario::create(['usuario_rut'=> $usuario_rut,'rol_id'=>4]);

        $rol_usuario->save();
        return redirect('encar/doce/modi');
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
		$doce=Docente::findOrFail($id);
	//	dd($doce->created_at);
		$depa=Departamento::lists('nombre','id');
		return view('Encargado.editarDoce', compact('doce','depa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$doce= Docente::findOrFail($id);
		//dd(count(Docente::where('rut',$doce->rut)));
	/*	if(count(Docente::where('rut',$doce->rut))>1){
         session::get('Ya existe una persona con el rut ingresado')
		}
        else{*/
		$doce->fill(Request::all());						
		$doce->save();
		return redirect('encar/doce/modi');
	}
	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$doce= Docente::findOrFail($id);
		$doce->delete();
		return redirect('encar/doce/modi');
	}

}
