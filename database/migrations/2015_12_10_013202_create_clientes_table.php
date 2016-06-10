<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre')->unique();
			$table->string('estado');
			$table->timestamps();
		});

	


		Schema::create('cliente_subarea', function(Blueprint $table)
		{
			$table->integer('cliente_id')->unsigned()->index();
			$table->integer('subarea_id')->unsigned()->index();
			$table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
			$table->foreign('subarea_id')->references('id')->on('subareas')->onDelete('cascade');
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
		Schema::drop('clientes');
		Schema::drop('cliente_subarea');
		
	}

}
