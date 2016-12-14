@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <p class="lead">Renta de peliculas</p>
            <p class="lead">Categorias</p>
            <div class="list-group"> 

               @foreach($cat as $c)
               <li>
                <a href="{{url('/mProductosPorCategoria')}}/{{$c->id}}" class="list-group-item">{{$c->nombre_categoria}}</a>
            </li>
            @endforeach

        </div>
    </div>

    <!--contenido de la pagina,mas valorados y carrusel-->
    <div class="col-md-9">

        <div class="row carousel-holder">

            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="{{asset ("/img/img1.jpg")}}" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="{{asset ("/img/img2.jpg")}}" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="{{asset ("/img/img3.jpg")}}" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="{{asset ("/img/img4.png")}}" alt="">
                        </div>
     
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div>

        <h2 class="text-center">BIENVENIDO AL MUNDO DE PELICULA</h2>
        <hr>


</div>

</div>

</div>

@endsection