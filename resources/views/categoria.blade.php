@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p class="lead">Categorias</p>
            <div class="list-group"> 

             @foreach($cat as $c)
             <li>
                <a href="{{url('/mProductosPorCategoria')}}/{{$c->id}}" class="list-group-item">{{$c->nombre_categoria}}</a>
            </li>
            @endforeach

        </div>
    </div>
    <div class="col-md-9">
     <h2>Categoria: {{$catName->nombre_categoria}}</h2>
     @forelse ($productos->chunk(3) as $products)
     <div class="row">
        @foreach($products as $p)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{asset("/img/$p->imagen")}}">
                <div class="caption">
                    <h4 class="pull-right">MXN {{$p->precio}}</h4>
                    <h4><a href="{{url('/mProductoIndividual')}}/{{$p->id}}">{{$p->nombre}}</a>

                    </h4>
                    <p>{{$p->descripcion}}</p>
                </div>
                <div class="ratings">
                    <p class="pull-right"></p>
                    <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </p>
                </div>
            </div>          
        </div>
        @endforeach
    </div>
    @empty
    <center>
        <p><h2>No se encontraron productos en esta categoria <span class="glyphicon glyphicon-remove-circle"></span></h2></p>
    </center>
    @endforelse
</div>	
</div>
</div>

</div>

</div>
</div>

@endsection