<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombres');
			$table->string('apellidos');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('telefono');
			$table->string('direccion');
			$table->enum('tipo',['admin','Area Administradora','Gerencia General','Direccion Administrativa','Direccion Medica']);
			$table->string('estado');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
