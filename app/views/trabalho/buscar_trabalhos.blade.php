<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    {{-- Adicionado arquivo do head --}}
    @include('template.head')
<body>
    <div id="wrapper">
        {{-- Adicionado topo --}}
        @include('template.topo.topo')

        <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          
            <li>
                <a href="{{ url('sair') }}"><i class="fa fa-sign-out"></i>Sair</a>
            </li>
        </ul>
    </div>
</nav>
        
        <div id="page-wrapper">
            <div id="page-inner">

                @if (Session::has('mensagem'))
                    <div class="alert alert-info" role="alert" id="fechar">
                        <i class="glyphicon glyphicon-ok"></i> {{ Session::get('mensagem') }}
                    </div>
                @endif
                
                {{-- Route::currentRouteName() --}}
                @yield('content')
                @define $busca =  (empty(Input::get('busca'))) ? 0 : Input::get('busca');
				<div class="row">
    			<form id="busca" action="{{ action('TrabalhosController@buscar_trabalhos') }}">
                  <div class="form-group">
                     <label for="exampleInputConversor">Trabalho de conclusão de curso</label>
                     <input type="text" class="form-control" name="busca" id="busca" placeholder="Pesquise um TCC...">
                  </div>
                  <button type="submit" class="btn btn-success"> <i class="fa fa-check-square" aria-hidden="true"></i>
                      Pesquisar
                  </button>
                 </form>
<?php 
$coringa = 1;
if($busca) 

  { 
?>
<br>
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
      <th scope="col" width="30%">Tema</th>
      <th scope="col" width="20%">Nome do orientando</th>
      <th scope="col" width="20%">Nome do orientador</th>
      <th scope="col" width="10%">Curso</th>
      <th scope="col" width="10%">Area</th>
      <th scope="col" width="5%">Arquivo</th>
    </tr>
  </thead>
  <tbody>
        @foreach($tcc as $teste)
    <tr>
      <th scope="row">{{$coringa++}}</th>
      <td>{{{ $teste->tema }}}  
        <br><a class="collapsible" style="color: #715691; background: #ffff"><b>Visualizar detalhes</b></a>
<div class="content">
  <p><b>Resumo:</b> {{$teste->resumo}}<br>
  <b>Tipo:</b> {{$teste->tipo}}<br>
  <b>Palavras Chaves:</b> {{$teste->palavras_chaves}}<br>
</div></td>
      <td>{{{ $teste->orientando }}}</td>
      <td>{{{ $teste->orientador }}}</td>
      <td>{{{ $teste->curso }}}</td>
      <td>{{{ $teste->area }}}</td>
      <td align="center">
         <a href="/images/tcc/{{$teste->arquivo}}" target="_blank">
                    <i class="fa fa-book "></i>
          </a>
    </td>
    </tr>
        @endforeach
    </tbody>
  </table>

<?php } ?>
			</div>
		</div>
</div>

</div>

            </div>
        </div>

    </div>
    {{-- Adicionado arquivo do rodape --}}
    @include('template.rodape.rodape')
    
    {{-- Adicionado arquivo de js --}}
    @include('template.js')
</body>
</html>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
