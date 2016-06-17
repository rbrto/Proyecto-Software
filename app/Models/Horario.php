<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

    protected $primaryKey = 'id';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'horarios';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fecha','curso_id','sala_id','periodo_id'];


	/*
	|	En la tabla hija, de la misma forma que en el caso anterior, usaremos la contraparte de la función que es:
	|
    |            $this->belongsTo('tabla_padre');
    */
	public function sala()
	{
		return $this->belongsTo('App\Models\Sala','sala_id','id');
	}

	public function periodo()
	{
		return $this->belongsTo('App\Models\Periodo','periodo_id','id');
	}

	public function curso()
	{
		return $this->belongsTo('App\Models\Curso','curso_id','id');
	}

}
