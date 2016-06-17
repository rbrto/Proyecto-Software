<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol_Usuario extends Model {

    protected $primaryKey = 'id';
    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'roles_usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['usuario_rut','rol_id'];

    /*public function usuarios()
    {
        return $this->belongsTo('App\Models\Usuario','usuario_rut','id');
    }


    public function roles()
    {
        return $this->belongsTo('App\Models\Rol','rol_id','id');
    }*/



    public static function id_usuario($id){
        return \DB::table('usuarios')
                    ->select('usuarios.rut')
                    ->join('roles_usuarios','usuarios.rut','=','roles_usuarios.usuario_rut')
                    ->where('usuarios.rut','=',$id)
                    ->get();
    }

    public static function is_rol($rut,$rol){
        $value = Rol_Usuario::select('usuario_rut','rol_id')
                ->join('roles','roles_usuarios.rol_id','=','roles.id')
                ->where('roles.nombre','=',$rol)
                ->where('roles_usuarios.usuario_rut','=',$rut)
                ->get();
        return count($value);
    }
}
