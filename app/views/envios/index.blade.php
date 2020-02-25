@extends('template.layout')
@section('content')
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
      <div  class="alert alert-success" role="alert">
         <p style="text-align: center; font-size: 25px" ><b>Envios realizados</b></p>
      </div>
  

<table class="table table-bordered ">
  <thead>
    <tr>
        <th width="50%">Data de envio</th>
        <th width="50%">Arquivo</th>
    </tr>
</thead>
<tbody>
        @foreach($envio as $teste)
            <tr>
                <td>{{format_date($teste->created_at)}} às {{date_format($teste->created_at,"H:i:s")}}</td>
                <td>
                    <a href="/envios/{{$teste->arquivo}}" target="_blank">
                    <i class="fa fa-book "> Baixar arquivo</i>
                    </a>
                </td>
            </tr>
        @endforeach
</tbody>
</table>


@stop