<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubareasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subareas', function(Blueprint $table)
		{
			$table->increments('id');
		
			 $table->string('nombres', 55);
			 $table->string('estado');
			$table->integer('area_id')->unsigned();
			$table->foreign('area_id')
                ->references('id')
                ->on('areas')
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
		Schema::drop('subareas');
	}

}
