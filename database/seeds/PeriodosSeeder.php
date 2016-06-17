<?php

use Illuminate\Database\Seeder;





class PeriodosSeeder extends DatabaseSeeder {

    public function run()
    {
        \DB::table('periodos')->delete();
        $bloque = ['Primer Periodo','Segundo Periodo','Tercer Periodo','Cuarto Periodo','Quinto Periodo','Sexto Periodo','Septimo Periodo','Octavo Periodo','Noveno Periodo'];
        $inicio = ['08:00','09:40','11:20','13:00','14:40','16:20','18:00','19:40','21:20'];
        $fin =    ['09:30','11:10','12:50','14:30','16:10','17:50','19:30','21:10','22:50'];


        for($i=0;$i<count($bloque);$i++){
            \DB::table('periodos')->insert(array(
                'bloque' => $bloque[$i],
                'inicio' => $inicio[$i],
                'fin'    => $fin[$i]
            ));
        }
    }

}