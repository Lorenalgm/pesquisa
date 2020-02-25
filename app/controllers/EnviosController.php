<?php

class EnviosController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    #Controla os meus envios da CSBC
    public function index()
    {

        $envio = Envio::select('*');
        
        $envio = $envio->orderBy('created_at');
        $envio = $envio->paginate(10);

        return View::make('envios.index', compact('envio'));
    }

}