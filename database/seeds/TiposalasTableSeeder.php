<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 16-07-15
 * Time: 02:00 PM
 */

use Illuminate\Database\Seeder;

class TiposalasTableSeeder extends DatabaseSeeder {

    public function run()
    {
        \DB::table('tipos_salas')->delete();
        $salas = ['Catedra','laboratorio de Computacion', 'laboratorio de Fisica', 'laboratorio de Electronica', 'laboratorio de Matematica'];

        foreach($salas as $sala){
            \DB::table('tipos_salas')->insert(array(
                'nombre' => $sala
            ));
        }
    }

}