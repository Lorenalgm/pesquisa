<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Validação CSRF
Route::when('*', 'csrf', array('post'));


##home
Route::get('/', 'HomeController@index');

// Route::get('/', 'LoginController@getEntrar');
Route::get('/login', 'LoginController@getEntrar');
Route::post('/entrar', 'LoginController@postEntrar');
Route::get('sair', 'LoginController@getSair');
Route::get('/buscar_trabalhos', 'TrabalhosController@buscar_trabalhos');

// Verifica se o usuário está logado
Route::group(array('before' => 'auth'), function()
{
	#Página principal após logar no sistema
	Route::get('/home', 'HomeController@home');

	//MENUS DE ADMINISTRAÇÃO
	Route::group(array('prefix' => 'home'), function () {
	    // ROTAS GLOBAIS
	    Route::resource('/perfis', 'PerfilController');
	    Route::resource('/usuarios', 'UsuarioController');


	    #Criação do trabalho
	    Route::get('/enviar_trabalhos', 'TrabalhosController@create');
	    Route::post('/criar_trabalho', 'TrabalhosController@store');

	    #Relatórios
	    Route::get('/dashboard', 'RelatoriosController@dashboard');


	    #Controla envio de arquivos da CSBC
	    Route::get('/meus_envios', 'EnviosController@index');


	    #Criação de usuários
	    Route::get('/criar_usuario', 'UsuarioController@create');
	    Route::get('/criando_user', 'UsuarioController@store');
	    Route::get('/usuarios', 'UsuarioController@index');
	    	    
	});

	// ROTAS DO ADMINISTRADOR
    Route::group(array('before' => 'auth.admin'), function()
    {
        Route::resource('usuarios', 'UsersController');
    });
});