<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model {

    protected $primaryKey = 'id';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre','descripcion','capacidad','campus_id','tipo_sala_id'];


	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function horario()
	{
		return $this->hasOne('App\Models\Horario','id');
	}

	
	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function campus() //RALACION 1:N
	{
		return $this->belongsTo('App\Models\Campus','campus_id','id');
	}

	public function tipo_sala() //RALACION 1:N
	{
		return $this->belongsTo('App\Models\Tipo_Sala','tipo_sala_id','id');
	}
    public static function mostrar_salas($id)
    {
        return Sala::where('campus_id','=',$id)
            ->get();
    	 // return \DB::table('salas')
           // ->select('nombre','id')
            //->where('campus_id','=',$id)
            //->get();
    }

    public static function query_nombre($nombre){
        return Sala::select('id')
            ->whereNombre($nombre)
            ->first();
    }

}
