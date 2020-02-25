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
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header trans_400">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<div class="logo"><a href="#">Mulheres<span> na pesquisa</span></a></div>
						<nav class="main_nav ml-auto mr-auto">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								
								
							</ul>
						</nav>
						<div class="log_reg">
							<div class="log_reg_content d-flex flex-row align-items-center justify-content-start">
								<div class="login log_reg_text"><a href="{{ action('LoginController@getEntrar') }}">Login</a></div>
							</div>
						</div>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->
	
	<div class="menu_overlay trans_400"></div>
	<div class="menu trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="log_reg">
			<div class="log_reg_content d-flex flex-row align-items-center justify-content-end">
				<div class="login log_reg_text"><a href="#">Login</a></div>
				<div class="register log_reg_text"><a href="#">Register</a></div>
			</div>
		</div>
		<nav class="menu_nav">
			<ul>
				<li><a href="{{action('HomeController@index')}}">Home</a></li>
				{{-- <li><a href="{{action('HomeController@busca')}}">Pesquise</a></li> --}}
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background"></div>
		<div class="background_image background_city" style="background-image:url(images/city.png)"></div>
		<div class="cloud cloud_1"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_2"><img src="images/cloud.png" alt=""></div>
		<div class="cloud cloud_3"><img src="images/cloud_full.png" alt=""></div>
		<div class="cloud cloud_4"><img src="images/cloud.png" alt=""></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Busque um artigo</div>
							<div class="home_text">Mulheres no mundo da ciência e da publicação científica</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="domain_search_form_container">
							<form  action="{{ action('TrabalhosController@buscar_trabalhos') }}" id="busca" class="domain_search_form d-flex flex-md-row flex-column align-items-center justify-content-start">
								<div class="d-flex flex-row align-items-center justify-content-start">
									<input type="text" class="domain_search_input busca" id="busca" name="busca" placeholder="Pesquise um tema..." required="required">
									<div class="domain_search_dropdown d-flex flex-row align-items-center justify-content-start">
										{{-- <i class="fa fa-chevron-down" aria-hidden="true"></i> --}}
										{{-- <div class="domain_search_selected">BCC</div> --}}
										{{-- <ul> --}}
											{{-- <li>BCC</li> --}}
											{{-- <li>EE</li> --}}
											{{-- <li>AU</li> --}}
										{{-- </ul> --}}
									</div>
								</div>
								<button type="submit" class="domain_search_button d-flex flex-row align-items-center justify-content-center"><img src="images/search.png" alt="">Pesquisar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Intro -->
{{-- 
	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col magic_fade_in">
					<div class="section_title text-center"><h2>Como começar?</h2></div>
				</div>
			</div>
			<div class="row intro_row">
				<div class="intro_dots magic_fade_in" style="background-image:url(images/dots.png)"></div>
				
				<!-- Intro Item -->
				<div class="col-lg-4 intro_col magic_fade_in">
					<div class="intro_item d-flex flex-column align-items-center justify-content-start text-center">
						<div class="intro_icon_container d-flex flex-column align-items-center justify-content-center">
							<div class="intro_icon"><img src="images/icon_1.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						</div>
						<div class="intro_item_content">
							<div class="intro_item_title">Pesquise um tema</div>
							<div class="intro_item_text">
								<p>Escolha o tema de sua preferência e digite na barra de pesquisa do site.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item -->
				<div class="col-lg-4 intro_col magic_fade_in">
					<div class="intro_item d-flex flex-column align-items-center justify-content-start text-center">
						<div class="intro_icon_container d-flex flex-column align-items-center justify-content-center">
							<div class="intro_icon"><img src="images/icon_2.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						</div>
						<div class="intro_item_content">
							<div class="intro_item_title">Filtre os melhores trabalhos</div>
							<div class="intro_item_text">
								<p>Você irá visualizar os melhores resultados para a sua pesquisa. Além disso, você também poderá filtrar os trabalhos por cursos</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item -->
				<div class="col-lg-4 intro_col magic_fade_in">
					<div class="intro_item d-flex flex-column align-items-center justify-content-start text-center">
						<div class="intro_icon_container d-flex flex-column align-items-center justify-content-center">
							<div class="intro_icon"><img src="images/icon_3.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						</div>
						<div class="intro_item_content">
							<div class="intro_item_title">Envie trabalhos</div>
							<div class="intro_item_text">
								<p>Você poderá enviar trabalhos científicos que, após aprovação, poderão ser vistos por milhares de pessoas.</p>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col text-center">
					<div class="intro_button text-center trans_200 ml-auto mr-auto"><a href="{{ action('LoginController@getEntrar') }}">Login</a></div>
				</div>
			</div>
		</div>
	</div>
 --}}
	<!-- Services -->

{{-- 	<div class="services">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/services.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col magic_fade_in">
					<div class="section_title text-center"><h2>Conheça o TCC TOP</h2></div>
				</div>
			</div>
			<div class="row services_row">
				
				<!-- Service -->
				<div class="col-lg-4 service_col magic_fade_in">
					<div class="service d-flex flex-column align-items-center justify-content-start text-center trans_200">
						<div class="service_icon"><img class="svg" src="images/icon_4.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						<div class="service_title"><h3>Mais de 1000 usuários ativos</h3></div>
						<div class="service_text">
							<p></p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 service_col magic_fade_in">
					<div class="service d-flex flex-column align-items-center justify-content-start text-center trans_200">
						<div class="service_icon"><img class="svg" src="images/icon_5.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						<div class="service_title"><h3>Mais de 5000 trabalhos registrados</h3></div>
						<div class="service_text">
							<p></p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-lg-4 service_col magic_fade_in">
					<div class="service d-flex flex-column align-items-center justify-content-start text-center trans_200">
						<div class="service_icon"><img class="svg" src="images/icon_6.svg" alt="https://www.flaticon.com/authors/freepik"></div>
						<div class="service_title"><h3>1 milhão de universitários ativos</h3></div>
						<div class="service_text">
					
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
 --}}
	<!-- Footer -->

	<footer class="footer magic_fade_in">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-6 footer_col magic_fade_in">
					<div class="footer_about">
						<div class="footer_logo">Mulheres<span> na pesquisa</span></div>
						<div class="footer_text">
							<p>Trabalhos científicos feito por mulheres</p></br>
							<p>Está com dúvidas? Entre em contato.</p>
						</div>
						<div class="contact_container">
							<form action="#" id="contact_form" class="contact_form">
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="contact_input" placeholder="Seu nome  completo" required="required">
									</div>
									<div class="col-md-6">
										<input type="email" class="contact_input" placeholder="Seu e-mail" required="required">
									</div>
								</div>
								<div>
									<textarea class="contact_input contact_textarea" placeholder="Mensagem" required="required"></textarea>
								</div>
								<button class="contact_button">Enviar</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-6 footer_col">
					<div class="footer_links">
						<div class="row">
							<div class="col-sm-6 footer_list_col magic_fade_in">
								<div class="footer_list_container">
									<div class="footer_list_title">Mulheres na pesquisa</div>
									<ul class="footer_list">
										<li><a href="{{ action('LoginController@getEntrar') }}">Login</a></li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>