<!doctype html>
<html lang="es">
<head>
    <title></title>
</head>
<body>

    <h1>Listado de rentas</h1>
    <hr>
    <table>
         <tr><th>Nombre</th><td>{{ Auth::user()->name }}</td></tr>
        <tr><th>Correo</th><td>{{ Auth::user()->email }}</td></tr>
     <tr><th>Dirreccion</th><td>{{ Auth::user()->address }}</td></tr>
    </table>
    <hr>
                             <div>
                                    <table>
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
                            <h2>Total de compra: MXN {{number_format($sum,2)}}</h2>
                            <p>Puedes descargar directamente el ticket desde el navegador</p>
                            <a href="{{url('/home')}}"><h2>Da click aqui para ir a inicio</h2></a>

</body>
</html>