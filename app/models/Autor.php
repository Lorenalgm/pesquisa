<?php

class Autor extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'autores';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'nome',
		'sexo'
	];

	/*
	 *
	 * regras de validação
	 * 
	*/
	public static $rules = [];

}