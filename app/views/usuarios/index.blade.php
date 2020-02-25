@extends('template.layout')

@section('content')
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}

@define $busca =  (empty(Input::get('busca'))) ? 0 : Input::get('busca');
<div class="row">
    			<form id="busca" action="{{ action('UsuarioController@index') }}">
                  <div class="form-group">
                     <label for="exampleInputConversor">Usuários</label>
                     <input type="text" class="form-control" name="busca" id="busca" placeholder="Pesquise um usuário...">
                  </div>
                  <button type="submit" class="btn btn-success"> <i class="fa fa-check-square" aria-hidden="true"></i>
                      Pesquisar
                  </button>
                 </form>


<?php 
$coringa = 1;
?>
<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col" width="5">Nº</th>
      <th scope="col" width="30%">Nome</th>
      <th scope="col" width="20%">E-mail</th>
    </tr>
  </thead>
  <tbody>
        @foreach($usuarios as $usuario)
    <tr>
      <th scope="row">{{$coringa++}}</th>
      <td>{{{ $usuario->nome }}}</td>
      <td>{{{ $usuario->email }}}</td>
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
