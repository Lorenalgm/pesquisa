@extends('template.layout')
@section('content')

<div class="page-header">
  <h2><i class="glyphicon glyphicon-book"></i> Usuário<small> Novo</small></h2>
</div>

<form method="get" id="usuarios" action="/home/criando_user">
                  <div class="form-group">
                     <label for="exampleInputConversor">Nome</label>
                     <input type="text" class="form-control" name="nome" id="nome" value="" placeholder="Digite o nome">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputConversor">E-mail</label>
                     <input type="text" class="form-control" name="email" id="email" value="" placeholder="Digite o email">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputConversor">Senha</label>
                     <input type="text" class="form-control" name="senha" id="senha" value="" placeholder="Digite sua senha">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputConversor">Perfil</label>
                     <select class="form-control" id="perfil_id" name="perfil_id">
                                            <option value="">Selecione</option>
                                            <option value="1">Funcionário</option>
                      </select>
                   </div>   
                  <button type="submit" class="btn btn-success"> <i class="fa fa-check-square" aria-hidden="true"></i>
                      Enviar
                  </button>
                  </form>

@stop