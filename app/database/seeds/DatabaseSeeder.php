<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PerfilTableSeeder');
		$this->call('UsuarioTableSeeder');
		// Fim do seed de povoamento local
		$this->call('TrabalhoTableSeeder');
		$this->command->info('
		**********************************************
		*   Banco criado e povoado! *
		**********************************************
		');
	}

}
