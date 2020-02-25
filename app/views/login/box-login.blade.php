<!DOCTYPE html>
<html lang="en">
<head>
<title>Mulheres na pesquisa</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="HostSpace template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<div class="home">
        <div class="home_background"></div>
        <div class="background_image background_city" style="background-image:url(images/city.png)"></div>
        <div class="cloud cloud_1"><img src="images/cloud.png" alt=""></div>
        <div class="cloud cloud_2"><img src="images/cloud.png" alt=""></div>
        <div class="cloud cloud_3"><img src="images/cloud_full.png" alt=""></div>
        <div class="cloud cloud_4"><img src="images/cloud.png" alt=""></div>
        <div class="home_container">
           <div class="container">
    {{ Form::open(array(
        'url' => 'entrar',
        'class'  => 'form-signin'
    )) }}
        <div align="center">
            <img src="{{ asset('images/logo.png') }}" width="90%">
        </div>
        <br>
        <div>
            <div class="form-group">
                {{ Form::email('email', '', array('class' => 'form-control input-lg', 'autofocus', 'placeholder' => 'E-mail')) }}
            </div>
        </div>
        <br>
        <div>
            <div class="form-group">
                {{ Form::password('senha', array('class' => 'form-control input-lg', 'placeholder' => 'Senha', 'onkeyup' => 'javascript:verifica()', 'id' => 'senha')) }}
            </div>
        </div>
        <br>
        {{-- @if (Session::has('flash_error'))
            <div class="alert alert-danger" id="fechar">
                <i class="fa fa-ban"></i> E-mail ou senha inválidos.
            </div>
        @endif --}}
        <label>
            {{ Form::checkbox('remember', 'remember', false) }} Lembre-se de mim
        </label>    
        {{ Form::submit('Entrar', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        {{-- <a href="#">Esqueci minha senha</a> --}}
    {{ Form::close() }}
<!-- Fim da função das telas de aviso -->
</div> <!-- /container -->
            </div>
        </div>
    </div>
