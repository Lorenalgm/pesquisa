<?php

class UsuarioController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 $busca = Input::get('busca');

        $usuarios = Usuario::select('*');
        
        $usuarios = $usuarios->where('nome', 'ilike', "%".$busca."%");

        $usuarios = $usuarios->orderBy('nome');
        $usuarios = $usuarios->paginate(10);

		return View::make('usuarios.index', compact('usuarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usuarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	 public function store()
    {
        $input = Input::all();

        $inputUsuario  = new Usuario($input);
   
        DB::INSERT('INSERT INTO usuarios (nome,email,senha,perfil_id, created_at, updated_at) VALUES (?, ?, ?, ?, now()::timestamp(0), now()::timestamp(0))', [$inputUsuario->nome, $inputUsuario->email, Hash::make('$inputUsuario->senha'), $inputUsuario->perfil_id]);

     return Redirect::action('UsuarioController@index')->with('mensagem', 'Usuário criado com sucesso.');
                
    }

}
