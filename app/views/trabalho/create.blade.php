@extends('template.layout')
@section('content')


<div class="page-header">
  <h2><i class="glyphicon glyphicon-book"></i> Trabalho científico<small> Novo</small></h2>
</div>

    <form method="post" id="trabalho" action="{{ action('TrabalhosController@store') }}" enctype="multipart/form-data">
                  <div class="form-group">
                   <input type="hidden" name="enviou" value="1">
                  Arquivo CSV:<br>
                  <input type="file" name="arquivo">
                   </div>
{{--                   <div class="form-group">
                     <label for="exampleInputConversor">Tema</label>
                     <input type="text" class="form-control" name="tema" id="tema" value="" placeholder="Digite o tema">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputConversor">Autores</label>
                     <input type="text" class="form-control" name="orientador" id="orientador" value="" placeholder="Digite o nome do orientador">
                  </div> --}}
                  {{--  <div class="form-group">
                     <label for="exampleInputConversor">Tipo</label>
                     <select class="form-control" id="tipo" name="tipo">
                                            <option value="">Selecione</option>
                                            <option value="Poster">Poster</option>
                                            <option value="Dissertação">Dissertação</option>
                                            <option value="Tese">Tese</option>
                      </select>
                  </div> --}}
                  <button type="submit" class="btn btn-success"> <i class="fa fa-check-square" aria-hidden="true"></i>
                      Enviar
                  </button>
                  </form>
 
@stop