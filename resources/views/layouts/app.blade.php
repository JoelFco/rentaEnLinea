<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Renta de peliculas</title>

    <!-- Styles -->
     <link href="{{asset ("css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset ("css/shop-homepage.css")}}" rel="stylesheet">
    <link href="{{asset ("css/star.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css")}}">
    <link rel="icon" type="image/png" href="{{asset ("/img/logo.png")}}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">


                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a href="{{ url('/home') }}" class="navbar-left"><img src="{{asset ("img/logo.png")}}" width="40px"></a>
                    <a class="navbar-brand" href="{{ url('/home') }}">Inicio</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/carro') }}">Rentas<span class="badge"></span><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                            <li><a href="{{ url('/login') }}">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
                            <li><a href="{{ url('/register') }}">Registro <span class="glyphicon glyphicon-pencil"></span></a></li>
                      
                           
                            @else
                            <li><a href="{{ url('/mostrarRentas') }}">Rentas del dia <span class="glyphicon glyphicon-pencil"></span></a></li>
                            <li><a href="{{ url('/carro') }}">Rentas<span class="badge"></span><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                            <li><a href="{{url('/pedidos')}}"><span class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}</a></li>
                            <li><a href="{{ url('/membresia') }}">Membresia <span class="glyphicon glyphicon-pencil"></span></a></li>
                            <li><a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout <span class="glyphicon glyphicon-log-out"></span>
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </li>
                            @endif
                      
                    </ul>
                </div>
            </div>
        </nav>
</div>
        @yield('content')
        
    

    <div class="container">
     @include('flash::message')

        <!-- Footer -->
        <footer>
        
        </footer>

    </div>

  <!-- jQuery -->
    <script src="{{ asset ("js/jquery.js")}}"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset ("js/bootstrap.min.js")}}"></script>
    <!-- Scripts -->
    <script src="{{("/js/app.js")}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.modal').modal();
        });
    </script>
</body>
</html>
