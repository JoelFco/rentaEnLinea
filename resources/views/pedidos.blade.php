@extends('layouts.app')
@section('content')
<div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Compras realizadas</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">

                                                <tr><th>Nombre</th><td>{{ Auth::user()->name }}</td></tr>
                                                <tr><th>Correo</th><td>{{ Auth::user()->email }}</td></tr>
                                    </table>
                                </div>
                                        <hr>
                                        <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse($mostrarPedidos as $m)
                                             <tr>
                                                <td>{{$m->nombre}}</td>
                                                <td>{{$m->cantidad}}</td>
                                                <td>MXN {{ number_format($m->importe, 2)}}</td>
                                            </tr> 
                                            @empty
                                            <h2 class="text-center">No hay compras registradas</h2>
                                            @endforelse
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    </div>

        <center>
         <a href="{{url('/home')}}" class="btn btn-warning btn-lg">Seguir rentando <span class="glyphicon glyphicon-heart"></span></a>
        </center>

@endsection