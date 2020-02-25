<?php

class RelatoriosController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function dashboard(){
        $homens = Autor::select(DB::raw('count(autores.id) as total'))->where('sexo', 'MASCULINO')->get();
        $mulheres = Autor::select(DB::raw('count(autores.id) as total'))->where('sexo', 'FEMININO')->get();

        return View::make('relatorios.dashboard')->with([
                'homens' => $homens,
                'mulheres' => $mulheres,
                ]);
    }

    
}