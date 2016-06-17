<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Sala;
use App\Models\Curso;
use App\Models\Campus;
use App\Models\Tipo_Sala;
use App\Models\Docente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


//use Illuminate\Http\Request;
use Request;
use DB;



class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$salas = Sala::paginate(); // Cambiar esto, si la db es muy grande queda la escoba
		$rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
         $salas=Sala::join('campus','salas.campus_id','=', 'campus.id')
			          ->where('salas.campus_id', $id_campus) 
			          ->select('salas.*') 
			          ->paginate();
			         // dd($salas);
		return view('Encargado.modifSalas',compact('salas','nombreCampus'));
		//		return view('Encargado.ElegirCampus',compact('campus'));

			
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$campus=Campus::select('nombre')->where('rut_encargado',$rut)->first();	
		$tipo=Tipo_Sala::lists('nombre','id');
		return view('Encargado.agregarSala',compact('campus','tipo'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data=Request::only(['nombre','tipo_sala_id','descripcion','capacidad']);
		$nombre=Request::get('nombre');
		$tipo=Request::get('tipo_sala_id');
		$descripcion=Request::get('descripcion');
		$capacidad=Request::get('capacidad');
        $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		//$campus=Campus::select('nombre')->where('rut_encargado',$rut)->first();	
		$rules=array(
            		 'nombre' => 'required|',
                     'capacidad' => 'required|numeric|min:0|max:50',
                              
		 		);    				

 		$val=Validator::make($data,$rules);	

 		if($val->fails())
 		{
            return redirect()->back()
            ->withErrors($val->errors())
            ->withInput();
 		}				 
		$sala=Sala::create(['nombre'=>$nombre,'tipo_sala_id'=>$tipo,'descripcion'=>$descripcion,'capacidad'=>$capacidad,'campus_id'=>$id_campus]);
		$sala->save();
		Session::flash('message', 'La sala '. $sala->nombre. ' fue creada con éxito');
		return redirect('encar/salas/modi');

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
		 $sala =Sala::findOrFail($id);
		 $tipo_sala = Tipo_Sala::lists('nombre','id');
		 $campus=Campus::lists('nombre','id');
		return view('Encargado.editarSalas',compact('sala','tipo_sala','campus'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sala = Sala::findOrFail($id);		
		$sala->fill(Request::all());
		$sala->save();
		
		return redirect('encar/salas/modi');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$salas = Sala::find($id);
		$salas->delete();
		Session::flash('message', 'La sala '. $salas->nombre. ' fue eliminada con éxito');
	    return redirect('encar/salas/modi');
	}

}
