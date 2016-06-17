<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 15-07-15
 * Time: 05:53 PM
 */

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesTableSeeder extends DatabaseSeeder{


    public function run()
    {
        \DB::table('roles')->delete();
        $nombres = ['Administrador', 'Encargado Campus', 'Estudiante', 'Docente'];
        $descripcion = [
            'Este perfil esta encargado de la administraci ́on general del sistema, puede crear/modificar/archivar campus, asignar encargados a estos, asignar perfiles a usuarios existentes en la base de datos de la universidad',
            'Este perfil esta encargado de la realidad de las salas en su/sus campus asignados: Modificar aspectos como la capacidad y nombre de salas.Asignacion de salas a un respectivo curso/evento en un periodo especifico del calendario academico. Ingreso de datos academicos',
            'Le permite consultar el horario de clase asignado a su persona, y sabiendo en que sala corresponde cada clase. Tambien puede realizar consultas epsecificas, talas como ver las asignaciones de salas de un dia especifico en un campus X en un periodo Y.',
            'Este perfil puede consultar en que periodos tenga que dictar catedras/laboratorio. Tambien puede realizar consultas epsecificas, talas como ver las asignaciones de salas de un dia especifico en un campus X en un periodo Y.'
        ];

        for($i=0;$i<4;$i++){
            \DB::table('roles')->insert(array(
                'nombre' => $nombres[$i],
                'descripcion' => $descripcion[$i]
            ));
        }
    }
}