<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 17-07-15
 * Time: 11:37 AM
 */

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Departamento;
use App\Models\Carrera;

class RolesUsuarioTableSeeder extends DatabaseSeeder{

    public function run(){
        \DB::table('roles_usuarios')->delete();
        \DB::table('docentes')->delete();
        \DB::table('estudiantes')->delete();

        //ASIGNAMOS LOS ROLES  A LOS USUARIOS

        $admin = Usuario::where('nombres','Oscar Eduardo')->first();
        $encargado = Usuario::where('nombres','Jean Pierre patric')->first();
        $profesor = Usuario::where('nombres','Sebastian')->first();

        $id_admin = Rol::whereNombre('ADMINISTRADOR')->first();
        $id_encargado = Rol::whereNombre('ENCARGADO_CAMPUS')->first();
        $id_docente = Rol::whereNombre('ESTUDIANTE')->first();
        $id_estudiante = Rol::whereNombre('DOCENTE')->first();

        //SEBASTIAN SALAZAR
        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $profesor->rut,
            'rol_id' => $id_admin->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $profesor->rut,
            'rol_id' => $id_encargado->id,
        ));


        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $profesor->rut,
            'rol_id' => $id_docente->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $profesor->rut,
            'rol_id' => $id_estudiante->id,
        ));


        //OSCAR MUÑOZ
        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $admin->rut,
            'rol_id' => $id_admin->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $admin->rut,
            'rol_id' => $id_docente->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $admin->rut,
            'rol_id' => $id_encargado->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $admin->rut,
            'rol_id' => $id_estudiante->id,
        ));



        //JEAN PIERE PATRIC
        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $encargado->rut,
            'rol_id' => $id_encargado->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $encargado->rut,
            'rol_id' => $id_estudiante->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $encargado->rut,
            'rol_id' => $id_admin->id,
        ));

        \DB::table('roles_usuarios')->insert(array(
            'usuario_rut' => $encargado->rut,
            'rol_id' => $id_docente->id,
        ));

        //POR DEFECTO LOS DOCENTES PERTENECERAN AL DEPARTAMENTO DE INFORMATICA
        $id_depto_informatica = Departamento::whereNombre('Informática y Computación')->first();
        \DB::table('docentes')->insert(array(
            'rut' => $profesor->rut,
            'nombres' => $profesor->nombres,
            'apellidos' => $profesor->apellidos,
            'email' => $profesor->email,
            'departamento_id' => $id_depto_informatica->id
        ));

        \DB::table('docentes')->insert(array(
            'rut' => $admin->rut,
            'nombres' => $admin->nombres,
            'apellidos' => $admin->apellidos,
            'email' => $admin->email,
            'departamento_id' => $id_depto_informatica->id
        ));

        \DB::table('docentes')->insert(array(
            'rut' => $encargado->rut,
            'nombres' => $encargado->nombres,
            'apellidos' => $encargado->apellidos,
            'email' => $encargado->email,
            'departamento_id' => $id_depto_informatica->id
        ));

        //POR DEFECTO LOS ESTUDIANTES PERTENECERAN A LA ESCUELA DE INFORMATICA
        $id_carrera_informatica = Carrera::whereNombre('Ingeniería en Informática')->first();
        \DB::table('estudiantes')->insert(array(
            'rut' => $profesor->rut,
            'nombres' => $profesor->nombres,
            'apellidos' => $profesor->apellidos,
            'email' => $profesor->email,
            'carrera_id' => $id_carrera_informatica->id
        ));

        \DB::table('estudiantes')->insert(array(
            'rut' => $encargado->rut,
            'nombres' => $encargado->nombres,
            'apellidos' => $encargado->apellidos,
            'email' => $encargado->email,
            'carrera_id' => $id_carrera_informatica->id
        ));

        \DB::table('estudiantes')->insert(array(
            'rut' => $admin->rut,
            'nombres' => $admin->nombres,
            'apellidos' => $admin->apellidos,
            'email' => $admin->email,
            'carrera_id' => $id_carrera_informatica->id
        ));
    }
}