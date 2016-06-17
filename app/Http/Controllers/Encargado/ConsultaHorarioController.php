<?php namespace App\Http\Controllers\Encargado;

use App\Http\Requests;
use App\Http\Controllers\Controller;


//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Periodo;
use App\Models\Horario;
use App\Models\Sala;
use DB;

use App\Models\Campus;

//use Illuminate\Http\Request;
use Request;
class ConsultaHorarioController extends Controller {

public function index()
	{
    $rut=Auth::user()->rut;
    $campus=Campus::select('nombre')->where('rut_encargado',$rut)->first();
    $bloques=Periodo::lists('bloque','id');

			return view('Encargado.modifHorario')->with('campus',$campus)->with('bloques',$bloques);
	}

	


	
	public function store()
	{
   // dd(Request::get('fecha'));
    $fecha=Request::get('fecha');
    $periodo=Request::get('periodo_id');
    $periodos=Periodo::find($periodo);
   // $periodos=Periodo::find('periodo');
   //dd($periodos);
    //dd($fecha);
    $rut=Auth::user()->rut;
    //$periodos=Periodo::where('id',$periodo)->paginate();
   // dd($periodos);
    $horario=Horario::where('fecha',$fecha)->paginate();
    //dd($horario);
    //DB::enableQuerylog();

        $id_campus= Campus::select('id')->where('rut_encargado',$rut)->first()->id;
    $salas=Horario::join('salas','horarios.sala_id','=','salas.id')
                   ->join('periodos','horarios.periodo_id','=','periodos.id')
                   ->where('salas.campus_id',$id_campus)
                   ->where('periodos.id',$periodo)
                   ->where('horarios.fecha',$fecha)
                   ->select('salas.*')
                   ->paginate();
               // dd($salas);
   
        return view('Encargado.mostrarHorario')->with('salas',$salas)->with('periodos',$periodos);

   // dd($join);
    /*
    $salas=Sala::join('campus','salas.campus_id','=', 'campus.id')
                ->where('salas.campus_id', $id_campus) 
                ->select('salas.*') 
                ->paginate();
*/
  /*  $join = \DB::table('horarios')
                    ->join('salas', 'horarios.sala_id', '=', 'salas.id')
                    ->join('periodos', 'horarios.periodo_id', '=', 'periodos.id')
                    ->where('salas.campus_id',$id_campus)
                    ->where('periodos.id',$periodo)
                    ->where('horarios.fecha',$fecha)->get();
    dd($join);*/
    //dd("entra");
    
    //dd(Request::all());
       //   dd(Request::get('bloque'));
       //  dd(Request::ajax());

		 

	
	}
  public function show(){

        return view('Encargado.mostrarHorario');

  }
}