@extends('layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rentas por membresia normal</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Nombre pelicula</th>
                                <th>Cantidad</th>
                                <th>Total Compra</th>
                            </tr>
                        </thead>
                        <tbody>

                           @php
                            $sum = 0
                            @endphp
                          
                            @foreach($rentasDiaNormal as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->cantidad}}</td>
                                <td>{{$p->totalCompra}}</td>
                                <?php $sum += $p->totalCompra; ?>
                               </tr>
                               @endforeach

                               
                           </tbody>
                       </table>
                   </div>

               </div>
           </div>
           <h4>Total de compras membresia normal: MXN {{number_format($sum,2)}}</h4>
           <hr>
       <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rentas por membresia Gold</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Nombre pelicula</th>
                                <th>Cantidad</th>
                                <th>Total Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          @php
                            $sum2 = 0
                            @endphp

                            @foreach($rentasDiaGold as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->cantidad}}</td>
                                <td>{{$p->totalCompra}}</td>
                                <?php $sum2 += $p->totalCompra; ?>
                               </tr>
                               @endforeach

                               
                           </tbody>
                       </table>
                   </div>

               </div>
           </div>
           <h4>Total de compras membresia gold: MXN {{number_format($sum2,2)}}</h4>
           <hr>
           <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rentas por categoria infantil</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Nombre pelicula</th>
                                <th>Cantidad</th>
                                <th>Total Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          @php
                            $sum3 = 0
                            @endphp

                            @foreach($rentasDiaInfantil as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->cantidad}}</td>
                                <td>{{$p->totalCompra}}</td>
                                <?php $sum3 += $p->totalCompra; ?>
                               </tr>
                               @endforeach

                               
                           </tbody>
                       </table>
                   </div>

               </div>
           </div>
           <h4>Total de compras categoria infantil: MXN {{number_format($sum3,2)}}</h4>
           <hr>
            <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rentas por categoria adolecente</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Nombre pelicula</th>
                                <th>Cantidad</th>
                                <th>Total Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          @php
                            $sum4 = 0
                            @endphp

                            @foreach($rentasDiaAdolecente as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->cantidad}}</td>
                                <td>{{$p->totalCompra}}</td>
                                <?php $sum4 += $p->totalCompra; ?>
                               </tr>
                               @endforeach

                               
                           </tbody>
                       </table>
                   </div>

               </div>
           </div>
           <h4>Total de compras categoria adolecente: MXN {{number_format($sum4,2)}}</h4>
           <hr>
           <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rentas por categoria adulto</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Nombre pelicula</th>
                                <th>Cantidad</th>
                                <th>Total Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          @php
                            $sum5 = 0
                            @endphp

                            @foreach($rentasDiaAdulto as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->cantidad}}</td>
                                <td>{{$p->totalCompra}}</td>
                                <?php $sum5 += $p->totalCompra; ?>
                               </tr>
                               @endforeach

                               
                           </tbody>
                       </table>
                   </div>

               </div>
           </div>
           <h4>Total de compras categoria adulto: MXN {{number_format($sum5,2)}}</h4>
           <hr>
       </div>
       @endsection