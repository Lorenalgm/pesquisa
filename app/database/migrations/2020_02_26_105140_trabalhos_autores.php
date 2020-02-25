<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrabalhosAutores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trabalhos_autores', function($table)
        {
            $table->increments('id');
            $table->integer('trabalho_id')->unsigned();
			$table->foreign('trabalho_id')->references('id')->on('trabalhos');
            $table->integer('autor_id')->unsigned();
			$table->foreign('autor_id')->references('id')->on('autores');
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
		Schema::drop('trabalhos_autores');
	}

}
