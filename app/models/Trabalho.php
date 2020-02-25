<?php

class Trabalho extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'trabalhos';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'arquivo',
		'tema'
	];

	/*
	 *
	 * regras de validação
	 * 
	*/
	public static $rules = [];

}