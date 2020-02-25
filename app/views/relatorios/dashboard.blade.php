@extends('template.layout')
<head>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js?hcode=c11e6e3cfefb406e8ce8d99fa8368d33"></script>
  <script src="https://cdn.anychart.com/releases/v8/themes/light_blue.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css?hcode=c11e6e3cfefb406e8ce8d99fa8368d33" type="text/css" rel="stylesheet">
</head>
<style type="text/css">
  #container {
    width: 50%;
    height: 50%;
  }
</style>

@section('content')
  <div id="container"></div>
@stop


<script>
    anychart.onDocumentReady(function () {
    anychart.theme('lightBlue');
        var chart = anychart.pie([
            ['Mulheres', {{$mulheres[0]->total}}],
            ['Homens', {{$homens[0]->total}}],
        ]);

        chart.title('Publicações por gênero')
                .innerRadius('40%');

        chart.labels().position('outside');
        chart.container('container');
        chart.draw();
    });
</script>