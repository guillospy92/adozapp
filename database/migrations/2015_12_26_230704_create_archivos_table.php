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
			$table->integer('subarea_id')->unsigned();
			$table->integer('ano_id')->unsigned();
			$table->string('ordenanza');
			$table->timestamp('fecha')->nullable();
			$table->foreign('subarea_id')->references('id')->on('subareas')->onDelete('cascade');
            $table->foreign('ano_id')->references('id')->on('anos')->onDelete('cascade');
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
