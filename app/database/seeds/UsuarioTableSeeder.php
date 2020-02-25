<?php

class UsuarioTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de usuarios
        DB::table('usuarios')->delete();

         Usuario::create(array(
                        'email' => 'lorena@proesc.com',
                        'senha' => Hash::make('senha'),
                        'nome'  => 'Lorena Góes',
                        'perfil_id'  => 1
                ));
        
	}

}