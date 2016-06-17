<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImportDatabaseSql extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::unprepared(File::get(base_path() . '/database/salas.sql')); // Corre el sql de importacion
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::unprepared(File::get(base_path() . '/database/salas_drop.sql')); // Corre el drop a todas las tablas
	}

}
