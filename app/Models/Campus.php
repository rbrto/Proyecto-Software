<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Monolog\Handler\NullHandlerTest;

class Campus extends Model {

	protected $primaryKey = 'id';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'campus';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre','direccion','latitud','longitud','descripcion','rut_encargado'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/

	public function facultad() //RELACION 1:N
	{
		return $this->hasMany('App\Models\Facultad','id');
	}

	public function salas() //RELACION 1:N
	{
		return $this->hasMany('App\Models\Sala','campus_id', 'id');
	}


    public static function query_nombre($nombre){
        return Campus::select('id')
                ->whereNombre($nombre)
                ->first();
    }


}
