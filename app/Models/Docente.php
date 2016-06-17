<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model {

    protected $primaryKey = 'id';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'docentes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['rut','nombres','apellidos','email','departamento_id'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function curso()
	{
		return $this->hasMany('App\Models\Curso','id');
	}

	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function departamento()
	{
		return $this->belongsTo('App\Models\Departamento','departamento_id','id');
	}
    public static function query_rut($rut){
        return Docente::select('id')
                ->where('rut',$rut)
                ->first();
    }
    public static function query_nombre($nombres){
        return Docente::select('id')
                ->where('nombres',$nombres)
                ->first();
    }
}
