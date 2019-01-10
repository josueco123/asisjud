<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Material Design fonts -->
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap Material Design -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-material-design.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/ripples.min.css') }}">

    <!-- Scripts -->
    <script src="https://localhost/laravelapps/asistentejudicial/node_modules/push.js/bin/push.min.js" ></script>

    <script>
        window.laravel = {!! json_encode ([
            'csrfToken' => csrf_token(),
        ])!!};
    </script>

</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{{ asset('js/ripples.min.js') }}"></script>
	<script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/bin/push.min.js') }}"></script>
    <script src="{{ asset('js/dropdown.js') }}"></script>
    
	

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #333A39;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/')}}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" id="bs-example-navbar-collapse-1">
                    
                    
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Buscar Procesos <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">  
                                    <a class="dropdown-item" href="{{ url('radicacion')}}">
                                       <p><strong>Numero de Radicacion</strong> </p>
                                    </a>

                                    <a class="dropdown-item" href="{{ url('juzgadofecha')}}">
                                    <strong>Juzgado</strong>
                                    </a>
                                </div>
                                
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('misprocesos')}}" >
                                Mis Procesos
                                </a>
                            </li>


                        <notification :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications }}" ></notification>
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a  class="dropdown-item" href="{!! action('UserdatosController@edit',auth()->id()) !!}">
                                        <p><strong>Actualizar Datos</strong></p>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <strong>{{ __('Logout') }}</strong>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
            @yield('content')
        
    </div>
</body>
</html>