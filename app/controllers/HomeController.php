<?php

class HomeController extends BaseController {

	public function index()
    {
        return View::make('home.index');
    }

    #Página principal após logar no sistema
    public function home(){

        $busca = Input::get('busca', null);

        $trabalho = Trabalho::select('*');
        
        if ($busca) {
            $trabalho = $trabalho->where('tema', 'ilike', "%".$busca."%");
        }

        $trabalho = $trabalho->orderBy('tema');
        $trabalho = $trabalho->paginate(10);

        return View::make('home.inicio', compact('trabalho'));
	}

}