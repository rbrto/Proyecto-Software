<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Sala;
use App\Models\Docente;
//use Illuminate\Http\Request;
use App\Models\Asignatura_Cursada;
use App\Models\Periodo;
use App\Models\Horario;
use Illuminate\Http\RedirectResponse;
use Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Campus;




class AsignarSalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$cursos=Curso::paginate();
		//$C=Curso::paginate();
		$rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
        $cursos=Curso::join('asignaturas','cursos.asignatura_id','=','asignaturas.id')
                     ->join('departamentos','asignaturas.departamento_id','=','departamentos.id')
			         ->join('facultades','departamentos.facultad_id','=','facultades.id')
			         ->join('campus','facultades.campus_id','=', 'campus.id')
			          ->where('facultades.campus_id', $id_campus) 
			          ->select('cursos.*') 
			          ->paginate();
		$cantidad_alumno = array();
		foreach ($cursos as $curso) {
			array_push($cantidad_alumno, Asignatura_Cursada::count_alumnos($curso->id));
		}
		return view('Encargado.asignarSala',compact('cursos','nombreCampus'))->with('cantidad_alumno', $cantidad_alumno);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data= Request::only(['sala_id','periodo_id','curso_id']);
	    $dias=Request::get('dias');
        $dato = Carbon::now(); // Fecha actual
        $lunes= $dato->subDays($dato->dayOfWeek-1); // Lunes de la semana actual
        $fin= Request::get('fecha'); //fin del semestre actual
        	
	    foreach($dias as $dia) // Iterar por los dias del formulario (lunes = 0 ... sab = 5)
	    {
             for($dia=$lunes->copy()->addDays($dia);$dia<$fin;$dia=$dia->copy()->addWeek()) //desde el primer dia de la semana, hasta el fin de semestre correspondiente, ahumentando semanalmente
             {
             	$data['fecha'] = $dia;
             	//VALIDAR PARA NO REPETIR LA SALA 
             	$horario= Horario::create($data);
             }
	    }
        return redirect('encar/asignar/modi');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show($id)
	{
		$cursoo=Curso::find($id);
	    $docente=$cursoo->docente;
	    $departamento=$docente->departamento;
	    $facultad=$departamento->facultad;
	    $campus=$facultad->campus;
	    $salass=Sala::mostrar_salas($campus->id);
	    $rut=Auth::user()->rut;
		$id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
		$nombreCampus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
         $sa=Sala::join('campus','salas.campus_id','=', 'campus.id')
			          ->where('salas.campus_id', $id_campus) 
			          ->select('salas.*') 
			          ->lists('salas.nombre','salas.id');
	//    $sa=Sala::lists('nombre','id');  
		$cantidad_alumno =Asignatura_Cursada::count_alumnos($cursoo->id);
		$periodos=Periodo::lists('bloque','id');
		
	    foreach ($salass as $key => $value) {
	    	$salasCampus[$key] = $value;
	    }
	    $probando = array();
	/*    foreach ($periodos as $value) {

	    	array_push($probando, $value->inicio.'-'.$value->fin);
	    }*/
		
	  	//dd($probando);	

	   return view('Encargado.ElegirSala',compact('cursoo','sa','campus','cantidad_alumno','periodos','probando'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cursos=Curso::find($id);
		
		$horario=$cursos->docente;
		dd($horario);
	 	$asignaturas=Asignatura::lists('nombre','id');
		$docentes=Docente::lists('nombres','id');
       
       return view('Encargado.editarCurs', compact('cursos','asignaturas','docentes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
