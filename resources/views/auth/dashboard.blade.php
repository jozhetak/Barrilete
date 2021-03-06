<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="robots" content="noindex,nofollow,nosnippet,noarchive" />
        <meta name="googlebot" content="noindex,nofollow,nosnippet,noarchive" />
        <link rel="stylesheet" href="{{asset('css/contenido.css')}}" />
        <link rel="stylesheet" href="{{asset('css/titularesIndex.css')}}" />
        <link rel="stylesheet" href="{{asset('css/forms.css')}}" />
        <link rel="stylesheet" href="{{asset('css/dashboard.css')}}" />
    </head>
    <body>       
        <header>
            <img class="logo" src="{{ asset('svg/logo_barrilete.svg') }}" onclick="location.href ='{{ route('default') }}'" title="Home" alt="Home" />
            <div id="main-search">
                <form action="{{ route('searchAuth') }}" method="get" id="search">
                    <input id="inputText" type="search" value="" name="query" placeholder="Buscar contenido" />
                    <button type="submit" title="Buscar" id="search-button"><img src="{{asset('svg/search.svg')}}" /></button>
                    <input type="hidden" value="articulos" name="sec" />
                    <input type="hidden" value="{{ Auth::user()->id }}" name="author" />
                </form>
            </div>
            <div id="user-menu">
                <p>{{ Auth::user()->name }}<img src="{{ asset('svg/arrow-down.svg') }}" /></p>
                <div id="user-options">
                    <a href="{{ route('options') }}" id="options"><img src="{{ asset('svg/options.svg') }}" />Opciones</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ asset('svg/log-out.svg') }}" />{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
            </div>
            <div id="user-notifications" style="display:none;">
               <img src="{{ asset('svg/chat.svg') }}" />
               <img src="{{ asset('svg/notification.svg') }}" />
               <img src="{{ asset('svg/info.svg') }}" />
            </div>
        </header>       
        <section class="dashboard">            
            <aside class="tools-bar">
                <h2>Mis publicaciones</h2>
                <a href="{{ route('viewArticles',['id' => Auth::user() -> id]) }}" class="selected"><img src="{{ asset('svg/file.svg') }}" />Artículos</a>
                <a href="{{ route('viewGalleries',['id' => Auth::user() -> id]) }}"><img src="{{ asset('svg/image.svg') }}" />Galerías</a>
                <a href="{{ route('viewPolls',['id' => Auth::user() -> id]) }}"><img src="{{ asset('svg/analytics.svg') }}" />Encuestas</a>
                <h2>Cargar publicaciones</h2>
                <a href="{{ route('formCreateArticle') }}"><img src="{{ asset('svg/add-file.svg') }}" />Artículos</a>
                <a href="{{ route('formGallery') }}"><img src="{{ asset('svg/image.svg') }}" />Galerías</a>
                <a href="{{ route('formPoll') }}"><img src="{{ asset('svg/note.svg') }}" />Encuestas</a>
                @if (Auth::user()->is_admin)
                <h2>Contenido sin publicar</h2>
                <a href="{{ route('unpublishedArticles') }}"><img src="{{ asset('svg/add-file.svg') }}" />Artículos</a>
                <a href="{{ route('unpublishedGalleries') }}"><img src="{{ asset('svg/image.svg') }}" />Galerías</a>
                <a href="{{ route('unpublishedPolls') }}"><img src="{{ asset('svg/note.svg') }}" />Encuestas</a>
                @endif
            </aside>
            <div id="loader"><center><img src="{{ asset('img/loader.gif') }}" /></center></div>
            <div id="user-content"></div>                       
        </section>
        <footer>
            <div class="footerContainer">
                <div>
                    <h2>Contacto</h2>
                    <ul>
                        <li><a href="mailto:info@barrilete.com.ar">info@barrilete.com.ar</a></li>
                    </ul>
                </div>
                <div>
                    <h2>Institucional</h2>
                    <p class="footerCopyright">Conrado Maranguello, responsable editorial</p>
                    <p class="footerCopyright">©2016 - 2019 todos los derechos reservados<br />Versión: 2.0 02122018 build 18.30 BETA</p>
                </div>
                <div class="footerSocialContainer">
                    <img src="{{ asset('svg/logo_barrilete.svg') }}" />
                    <img src="{{ asset('svg/facebook.svg') }}" class="footerSocialFacebook" />
                    <img src="{{ asset('svg/twitter.svg') }}" class="footerSocialTwitter" />
                </div>
            </div>                
        </footer>
        <!-- scripts -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            // LOAD CONTENIDO PAGINA PRINCIPAL DASHBOARD
            $('#user-content').load('{{ route('viewArticles',['id' => Auth::user() -> id]) }}').prepend('<div id="loader"><center><img src="{{ asset("img/loader.gif") }}" /></center></div>').hide().fadeIn('normal');
        });
        </script>
    </body>
</html>