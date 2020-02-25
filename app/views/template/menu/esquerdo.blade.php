<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <center>
                        <?php $imagem = "upload/perfis/".Auth::user()->foto?>
                        @if (!Auth::user()->foto)
                            <img src="{{ asset('template/assets/img/user.jpg') }}" class="img-circle">
                        @else
                            <img src="{{ asset($imagem) }}" class="img-circle">                            
                        @endif
                        <div class="perfil">
                            <?php
                                #Pega Nome e Sobrenome
                                $nome_usuario = explode(' ', trim(Auth::user()->nome));
                                $cont = count($nome_usuario)-1;
                            ?>
                            {{ $nome_usuario[0]  }}<br>
                            <?php
                            #Criptografa o ID do usuario
                            $hash = Crypt::encrypt(Auth::user()->id);
                            ?>
                        </div>
                    </center>
                </div>
            </li>

          
             <li {{ (Request::is('*trabalhos*') ? 'class="active"' : '') }}>
                <a href="#"><i class="fa fa-book "></i>Trabalho <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a {{ (Request::is('*buscar_trabalhos*') ? 'class="active-menu"' : '') }} href="{{action('HomeController@home')}}"><i class="fa fa-search "></i>Buscar Trabalhos</a>
                    </li>
                    <li>
                        <a {{ (Request::is('*meus_envios*') ? 'class="active-menu"' : '') }} href="{{action('EnviosController@index')}}"><i class="fa fa-inbox "></i>Meus Envios</a>
                    </li>
                    <li>
                        <a {{ (Request::is('*enviar_trabalhos*') ? 'class="active-menu"' : '') }} href="{{action('TrabalhosController@create')}}"><i class="fa fa-book "></i>Enviar trabalhos</a>
                    </li>
                </ul>
            </li>
             <li {{ (Request::is('*relatorios*') ? 'class="active"' : '') }}>
                <a href="#"><i class="fa fa-book "></i>Relatórios <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a {{ (Request::is('*dashboard*') ? 'class="active-menu"' : '') }} href="{{action('RelatoriosController@dashboard')}}"><i class="fa fa-search "></i>Dashboard</a>
                    </li>
                </ul>
            </li>
          {{--   <li {{ (Request::is('*usuarios*') ? 'class="active"' : '') }}>
                <a href="#"><i class="fa fa-user "></i>Usuarios<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a {{ (Request::is('*buscar_usuarios*') ? 'class="active-menu"' : '') }} href="{{action('UsuarioController@index')}}"><i class="fa fa-search "></i>Buscar usuários</a>
                    </li>
                    <li>
                        <a {{ (Request::is('*criar_usuarios*') ? 'class="active-menu"' : '') }} href="{{action('UsuarioController@create')}}"><i class="fa fa-book "></i>Criar usuários</a>
                    </li>
                </ul>
            </li> --}}


            <li>
                <a href="{{ url('sair') }}"><i class="fa fa-sign-out"></i>Sair</a>
            </li>
        </ul>
    </div>
</nav>