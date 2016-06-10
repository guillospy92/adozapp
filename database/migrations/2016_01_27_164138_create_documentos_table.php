<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cliente_id')->unsigned();
			$table->integer('esperado_id')->unsigned();
			$table->integer('factura_id')->unsigned();
			$table->integer('subarea_id')->unsigned();
			$table->string('file');
			$table->string('tipo');
			$table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

            $table->foreign('esperado_id')
                ->references('id')
                ->on('esperados')
                ->onDelete('cascade');

            $table->foreign('factura_id')
                ->references('id')
                ->on('facturas')
                ->onDelete('cascade');

            $table->foreign('subarea_id')
                ->references('id')
                ->on('subareas')
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
		Schema::drop('documentos');
	}

}
