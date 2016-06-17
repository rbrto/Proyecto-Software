<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

    protected $primaryKey = 'id';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cursos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['semestre','anio','seccion','docente_id','asignatura_id'];

	/*
	|Para relacionar la tabla padre con la tabla hija usaremos la función:
	|
    |           $this->hasMany('tabla_hija','clave_foranea','clave_local');
	|
	*/
	public function horario()
	{
		return $this->hasMany('App\Models\Horario','id');
	}

	/*
	|	En este tipo de relaciones se hace uso de una tabla intermedia o pivote para hacer las relaciones y en ambas 
	|	tablas se utiliza una misma función:
	|
    |           $this->belongsToMany('tabla_relacionada','tabla_pivote','clave_primera_tabla','clave_segunda_tabla');
	*/

    public function estudiante()
    {
    	return $this->belongsToMany('App\Models\Estudiante','asignaturas_cursadas','curso_id','estudiante_id');
    }

	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function asignatura()
	{
		return $this->belongsTo('App\Models\Asignatura','asignatura_id','id');
	}

	public function docente()
	{
		return $this->belongsTo('App\Models\Docente','docente_id','id');
	}


	public static function query_nombre($nombre){
        return Curso::select('id')
                ->whereNombre($nombre)
                ->first();
    }
      public static function storeRules()
    {
        return array(                     //se utiliza un arrays asociativo
            'asignatura_id'        => 'required',
            'docente_id'           => 'required',
            'semestre'             => 'required',
            'anio' 				   => 'required',
            'seccion'			   => 'required'

            );
    }

	
}
