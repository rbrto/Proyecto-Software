<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Asignatura_Cursada;
use App\Models\Estudiante;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campus;

class AsignaturasCursadasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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
		return view('Encargado.modificarCursadas',compact('cursos','nombreCampus'))->with('cantidad_alumno', $cantidad_alumno);
	//	return view('Encargado.modificarCursadas',compact('cursos','cantidad_alumno'));
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
		$rut=Request::get('rut');
        $curso=Request::get('curso_id');
        //dd(count(Estudiante::select('id')->where('rut',$rut)->first()->id));
		$id=Estudiante::select('id')->where('rut',$rut)->first()->id;
        if(count($id)==0)
        {
         Session::flash('message', 'Curso seccion: \n'.$value->seccion.' semestre'.$value->semestre.'Ya esta registrado');
        }
        else{
		$asigCursada = Asignatura_Cursada::create(['curso_id' => $curso,'estudiante_id'=> $id]);
        $asigCursada->save();
        return redirect('encar/cursadas/modi');
    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$curso=Curso::find($id);
		
	    return view('Encargado.AsignarEstudiante',compact('curso'));

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
