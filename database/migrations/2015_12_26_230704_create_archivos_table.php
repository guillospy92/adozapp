<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('archivos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('file');
			$table->string('name');
			$table->string('size');
			$table->string('tipo');
			$table->integer('subarea_id')->unsigned();
			$table->integer('cliente_id')->unsigned();
			$table->integer('ano_id')->unsigned();
			$table->integer('mouth_id')->unsigned();
			$table->foreign('subarea_id')
                ->references('id')
                ->on('subareas')
                ->onDelete('cascade');
           	$table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
            $table->foreign('ano_id')
                ->references('id')
                ->on('anos')
                ->onDelete('cascade');
            $table->foreign('mouth_id')
                ->references('id')
                ->on('mouths')
                ->onDelete('cascade');
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
		Schema::drop('archivos');
	}

}
