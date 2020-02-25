<?php

class TrabalhoAutor extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'trabalhos_autores';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'trabalho_id',
		'autor_id'
	];

	/*
	 *
	 * regras de validação
	 * 
	*/
	public static $rules = [];

}