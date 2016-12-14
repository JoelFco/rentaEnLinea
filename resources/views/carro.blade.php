@extends('layouts.app')
@section('content')
<div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Carrito de compras</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Disponibles</th>
                                                <th>Cantidad</th>
                                                <th>Precio unitario</th>
                                                <th>Subtotal</th>
                                                <th>Eliminar Producto</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                            $sum = 0
                                            @endphp
                                                          
                                        	@foreach($productosCarrito as $m)
                                            <tr>
                                                <td>{{$m->nombre}}</td>
                                                <td>{{$m->cantidad}}</td>
                                            <form action="{{url('/actualizarCarro')}}" method="post">
               								<input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <td>
                                                    <input type="number" min="1" max="{{$m->cantidad}}" name="cantidad_articulos" value="{{$m->cantidadPedido}}">
                                                    <input class="form-control" name="id_producto" type="hidden" value="{{$m->id_producto}}" required>
                                                    <input type="submit" class="btn btn-primary btn-xs" value="Actualizar precio">
                                                </td>
                                            </form>
                                                <td>MXN {{ number_format($m->precio, 2) }}</td>
                                                <td>MXN {{ number_format($m->subtotal, 2) }}</td>
                                                <?php $sum += $m->subtotal; ?>
                                                <td><a href="{{url('/eliminarCar')}}/{{$m->id_producto}}" class="btn btn-danger btn-xs">Eliminar</a></td>
                                            </tr> 
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h2>Total de compra: MXN {{number_format($sum,2)}}</h2>
                    </div>
          <center>
         <a href="{{url('/caja')}}" class="btn btn-warning btn-lg">Continuar <span class="glyphicon glyphicon-arrow-right"></a>
         </center>

@endsection