<?php

class Envio extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'envios';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'arquivo'
	];

	/*
	 *
	 * regras de validação
	 * 
	*/
	public static $rules = [];

}