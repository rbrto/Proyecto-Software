<?php namespace App\Http\Controllers\Docente;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Periodo;
use App\Models\Sala;
use Auth;
use Request;
use DB;
use Illuminate\Support\Facades\Session;
class ConsultaSalasController extends Controller{

        public function getShowasignatura(){
            $user = Auth::user();
            $id = Docente::where('rut',$user->rut)->first()->id;

            $join = DB::table('docentes')
                ->select('horarios.fecha as Dia','cursos.seccion','salas.nombre as sala_nombre','periodos.bloque','asignaturas.nombre as nombre_asignatura')
                ->where('docentes.id',$id)
                ->join('cursos','cursos.docente_id','=','docentes.id')
                ->where('cursos.docente_id',$id)
                ->join('asignaturas','asignaturas.id','=','cursos.asignatura_id')
                ->join('horarios','horarios.curso_id','=','cursos.id')
                ->join('periodos','periodos.id','=','horarios.periodo_id')
                ->join('salas','salas.id','=','horarios.sala_id')
                ->paginate();

            $periodo = Periodo::paginate();

            return view('Docente.Horario.index')->with('cursos',$join)->with('bloques',$periodo);
        }

    public function getConsulta(){
        $salas = Sala::lists('nombre','id');
        $periodo = Periodo::lists('bloque','id');
        return view('Docente.Horario.consulta')->with('salas',$salas)->with('periodo',$periodo);
    }

    public function postConsutla(){
        $request = Request::only(['periodo','sala']);
        if(count(Horario::where('sala_id',$request['sala'])->where('periodo_id',$request['periodo'])->first()) > 1){
            Session::flash('message', 'sala '.Sala::find($request['sala'])->first()->nombre.' ocupada en el periodo '.Periodo::find($request['periodo'])->first()->bloque);
            return redirect()->route('Docente.Consulta.show');
        }
        else{
            Session::flash('message', 'sala '.Sala::find($request['sala'])->first()->nombre.' desocupada en el periodo '.Periodo::find($request['periodo'])->first()->bloque);
            return redirect()->route('Docente.Consulta.show');
        }

    }
}