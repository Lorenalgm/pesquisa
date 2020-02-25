@extends('template.layout')

@section('content')
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}

@define $busca =  (empty(Input::get('busca'))) ? 0 : Input::get('busca');
<div class="row">
    			<form id="busca" action="{{ action('HomeController@home') }}">
                  <div class="form-group">
                     <label for="exampleInputConversor">Trabalhos cietíficos feitos por mulheres</label>
                     <input type="text" class="form-control" name="busca" id="busca" placeholder="Pesquise um tema ou autora">
                  </div>
                  <button type="submit" class="btn btn-success"> <i class="fa fa-check-square" aria-hidden="true"></i>
                      Pesquisar
                  </button>
                 </form>


<?php 
$coringa = 1;
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 1px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>
</head>

<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col" width="5">Nº</th>
      <th scope="col" width="55%">Tema</th>
      <th scope="col" width="30%">Autores</th>
      <th scope="col" width="10%">Arquivo</th>
    </tr>
  </thead>
  <tbody>
        @foreach($trabalho as $teste)

          <?php 
              $autores = Autor::select('autores.nome')
                        ->leftJoin('trabalhos_autores', 'trabalhos_autores.autor_id', '=','autores.id')
                        ->where('trabalhos_autores.trabalho_id', $teste->id)
                        //->where('sexo', 'FEMININO')
                        ->get();
          ?>

    <tr>
      <th scope="row">{{$coringa++}}</th>
      <td>{{{ $teste->tema }}}</td> 
      <td>
          @foreach($autores as $autor)
              {{$autor->nome}} <br>    
          @endforeach
      </td>
      <td align="center">
        <a href="/images/tcc/{{$teste->arquivo}}" target="_blank">
        <i class="fa fa-book ">Arquivo</i>
        </a>
    </td>
    </tr>
        @endforeach
    </tbody>
  </table>

			</div>
		</div>
</div>

</div>

@stop
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}
