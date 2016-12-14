@extends('layouts.app')
@section('content') 
<div class="container">

    <div class="row">

        <div class="col-md-3">
                <p class="lead">Renta de peliculas</p>
            <div class="list-group"> 

                 @foreach($cat as $c)
                <li>
                    <a href="{{url('/mProductosPorCategoria')}}/{{$c->id}}" class="list-group-item">{{$c->nombre_categoria}}</a>
                </li>
                @endforeach

            </div>
        </div>

            @forelse($producto as $p)

                    <div class="row">
                      <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="image-responsive" src="{{ asset("/img/$p->imagen")}}">
                            <div class="caption">
                                <h4 class="pull-right">MXN {{$p->precio}}</h4>
                                <h4><a href="{{url('/mProductoIndividual')}}/{{$p->id}}">{{$p->nombre}}</a>

                                </h4>
                                <p>{{$p->descripcion}}</p>
                                <p class="pull-right">Stock {{$p->cantidad}}</p>
                            </div>
                        </div>

                        <!--verifica el que este logueado para poder agregar al carrito y que haya stock de producto-->
                        @if(Auth::guest())
                            <h4>Necesitas estar logueado para agregar a rentas</h4>
                             @else
                                 @if($p->cantidad==0)
                                    <h4>No hay stock de este producto por el momento</h4>
                                        @else
                                    <a class="btn btn-warning" href="{{url('/addCar')}}/{{$p->id}}">Rentar<span class="glyphicon glyphicon-heart"></span></a>
                                 @endif
                         @endif
                    </div>
                </div>
    

           @empty

                    <center>
                    <p><h2>Esta pelicula no existe <span class="glyphicon glyphicon-remove-circle"></span></h2></p>
                    </center>
                    
            @endforelse

                </div>

            </div>

@endsection