<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura_Cursada extends Model {
    protected $primaryKey = 'id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'asignaturas_cursadas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['estudiante_id','curso_id'];

    public function estudiante()
    {
        return $this->belongsTo('App\Models\Estudiante','estudiante_id','id');
    }


    public function curso()
    {
        return $this->belongsTo('App\Models\Curso','curso_id','id');
    }



    public static function count_alumnos($id)
    {
        return \DB::table('asignaturas_cursadas')
            ->select('estudiante_id')
            ->where('curso_id','=',$id)
            ->count();
    }



}
