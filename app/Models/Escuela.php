<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model {

    protected $primaryKey = 'id';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'escuelas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre','descripcion','departamento_id'];


	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function carrera()
	{
		return $this->hasOne('App\Models\Carrera','id');
	}

	
	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function departamento() //RALACION 1:N
	{
		return $this->belongsTo('App\Models\Departamento','departamento_id','id');
	}

    public static function Nombre($nombre){
        $dato = count(Escuela::whereNombre($nombre)->first());
        if($dato == 0){
            return false;
        }
        else
            return true;

    }
}
