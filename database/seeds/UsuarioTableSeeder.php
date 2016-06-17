<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 16-07-15
 * Time: 02:32 PM
 */

use Illuminate\Database\Seeder;


class UsuarioTableSeeder extends  DatabaseSeeder{

    public function run(){
        \DB::table('usuarios')->delete();

        $nombres = ['Oscar Eduardo', 'Jean Pierre patric','Sebastian'];
        $apellidos = ['Muñoz Bernales', 'Cid bustos','Salazar'];
        $email = ['munoz.bernales.oscar@gmail.com','Jeanpierre.cid@gmail.com','sebasalazar@gmail.com '];
        $rut = [17860032,18028419,15997886];



        for($i=0;$i<3;$i++){
            \DB::table('usuarios')->insert(array(
                'rut' => $rut[$i],
                'email' => $email[$i],
                'nombres' => $nombres[$i],
                'apellidos' => $apellidos[$i],
                'created_at' => date("Y-m-d G:i:s"),
                'updated_at' => date("Y-m-d G:i:s")
            ));
        }


    }

}