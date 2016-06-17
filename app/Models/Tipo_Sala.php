<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Sala extends Model {

    protected $primaryKey = 'id';
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tipos_salas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre','descripcion'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function sala()
	{
		return $this->hasOne('app\Models\Sala','id');
	}

    public static function query_nombre($nombre){
        return Tipo_Sala::select('id')
            ->whereNombre($nombre)
            ->first();
    }

}
