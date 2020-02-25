<?php

class TrabalhosController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    #Método para criar o trabalho
    public function create(){
        return View::make('trabalho.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    #Método para salvar trabalho
    public function store(){
        // DB::beginTransaction();
        $input = Input::all();
        $directory = public_path().'/envios';


        $inputEnvio = new Envio($input);

        if (Input::hasFile('arquivo')) {
                $file      = Input::file('arquivo');
                $nome    = sha1(Auth::user()->id.time()).".csv";
                
                $file->move($directory, $nome);
        }

   
        DB::INSERT('INSERT INTO envios (arquivo, created_at, updated_at) 
                    VALUES (?, now()::timestamp(0), now()::timestamp(0))', [$nome]);


        $handle = fopen(public_path().'/envios/'.$nome, "r");
        $dados  = [];

        while (($line = fgetcsv($handle)) !== false)
        {
            $dados[] = $line;
        }

        $linhas              = count($dados);
        $linha               = 0;
        
        for ($i=1; $i < $linhas; $i++) {
            DB::beginTransaction();

            $trabalho               = new Trabalho();
            $trabalho->tema         = strtoupper($dados[$i][1]);
            $trabalho->arquivo      = $dados[$i][2];
            
            if($trabalho->save()){
                $linha++;
                DB::commit();
            }

            $autores  = explode("; ", $dados[$i][0]);

            foreach ($autores as $autor_cadastro) {
                $autor_nome = $autor_cadastro;
                $autor_sexo = 'FEMININO';

                // $url = 'https://gender-api.com/get?key=USpLMENLMutFgKnGLh&name='.$autor_nome;
                
                // $curl = curl_init();
                // curl_setopt($curl, CURLOPT_URL, $url);
                // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($curl, CURLOPT_USERPWD, 'USpLMENLMutFgKnGLh');

                // $resposta = json_decode(curl_exec($curl), True);

                // curl_close($curl);

                // if ($resposta->gender == 'female') {
                //     $autor_sexo = 'FEMININO';
                // }else{
                //     $autor_sexo = 'MASCULINO';
                // }

                $autor               = new Autor();
                $autor->nome         = strtoupper($autor_nome);
                $autor->sexo         = $autor_sexo;
                if($autor->save()){
                    DB::commit();
                }

                $trabalho_autor               = new TrabalhoAutor();
                $trabalho_autor->trabalho_id  = $trabalho->id;
                $trabalho_autor->autor_id     = $autor->id;
                if($trabalho_autor->save()){
                    DB::commit();
                }
            }

        }

     return Redirect::action('EnviosController@index')->with('mensagem', $linha.' trabalho(s) enviado(s) com sucesso.');
                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id){
        $tcc = Tcc::find($id);
        $tcc->delete();

        return Redirect::action('TrabalhosController@index')->with('mensagem', 'Trabalho excluído com sucesso.');
    }

    
}