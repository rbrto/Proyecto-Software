<?php namespace App\Http\Controllers\Docente;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Usuario;
use Auth;
use DB;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class DocUserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Auth::user();
        $id = Docente::where('rut',$user->rut)->first()->id;
        $join = DB::table('docentes')->select('cursos.seccion','salas.nombre as sala_nombre','periodos.bloque','asignaturas.nombre as nombre_asignatura')
                                     ->where('docentes.id',$id)
                                     ->join('cursos','cursos.docente_id','=','docentes.id')
                                     ->join('asignaturas','asignaturas.id','=','cursos.asignatura_id')
                                     ->join('horarios','horarios.curso_id','=','cursos.id')
                                     ->join('periodos','periodos.id','=','horarios.periodo_id')
                                     ->join('salas','salas.id','=','horarios.sala_id')
                                     ->get();
        //dd($join);

        //dd(Curso::where('docente_id',$docente->id)->first());
		return view('Docente.Body')->with('user',$user);
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
        $usuario = Usuario::find($id);
        if($usuario){
            $datos = Request::only('nombres','apellidos','email');
            $usuario->fill($datos);
            $usuario->save();

            return redirect()->route('Docente.home.index');
        }
        else{
            abort(404);
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
		//
	}

}
