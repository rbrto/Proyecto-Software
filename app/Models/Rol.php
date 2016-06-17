<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    protected $primaryKey = 'id';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = ['nombre','descripcion'];

    public function usuarios()
    {
        return $this->belongsToMany('App\Models\Usuario', 'roles_usuarios', 'rol_id', 'usuario_rut');
    }

    public static function query_nombre($nombre){
        return Rol::select('id')
            ->whereNombre($nombre)
            ->first();
    }


}
