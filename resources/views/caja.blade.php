@extends('layouts.app')
@section('content')
<meta http-equiv="refresh" content="3">
<div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Detalles del pedido</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">

                                                <tr><th>Nombre</th><td>{{ Auth::user()->name }}</td></tr>
                                                <tr><th>Correo</th><td>{{ Auth::user()->email }}</td></tr>
                                                <tr><th>Dirreccion</th><td>{{ Auth::user()->address }}</td></tr>
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
                                                <th>Precio unitario</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                            $sum = 0
                                            @endphp

                                            @foreach($mostrarCaja as $m)
                                             <tr>
                                                <td>{{$m->nombre}}</td>
                                                <td>{{$m->cantidadPedido}}</td>
                                                <td>MXN {{ number_format($m->precio,2)}}</td>
                                                <td>MXN {{ number_format($m->subtotal, 2)}}</td>
                                                <?php $sum += $m->subtotal; ?>
                                            </tr> 
                                            @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    <h2>Total de compra: MXN {{number_format($sum,2)}}</h2>
    </div>
        <center>
         <a href="{{url('/carro')}}" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a>
        <!--Enviar el total de compra al controlador para almacenarlo en la tabla compras-->
        <form action="{{url('/pedido')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input class="form-control" type="hidden" name="total" value="{{$sum}}" required>
         <button type="submit" class="btn btn-warning btn-lg">Hacer Pedido <span class="glyphicon glyphicon-heart"></span></a>
         </center>
         </form>
@endsection