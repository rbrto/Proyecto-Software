<?php namespace App\Http\Controllers\Estudiante;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudiante;
use App\Models\Asignatura;
use App\Models\Asignatura_Cursada;

use App\Models\Curso;



class horarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rut=Auth::user()->rut;
		
		$id_estu=Estudiante::where('rut',$rut)->first()->id;
		//dd($id_estu);
	    $estu=Estudiante::find($id_estu);
	  // dd($estu->curso->asignatura()->nombre);
	    $cursos=$estu->curso;
	    $Asignatura_Cursada=Asignatura_Cursada::join('estudiantes','asignaturas_cursadas.estudiante_id','=','estudiantes.id')
	                                            ->join('cursos','asignaturas_cursadas.curso_id','=','cursos.id')
	                                            ->join('asignaturas','cursos.asignatura_id','=','asignaturas.id')
	                                            ->where('estudiantes.rut',$rut)
	                                            ->select('asignaturas.*')
	                                            ->paginate();

	  
	   //  dd($Asignatura_Cursadas);
	   /*  $departamento=$docente->departamento;
	    $facultad=$departamento->facultad;
	    $campus=$facultad->campus;
	    $asignatura=$cursos->asignatura;
	    $nombre=$asignatura->nombre;
	    dd($nombre);*/
				return view('Estudiantes.horario',compact('Asignatura_Cursada'));
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
		//
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
		//
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
