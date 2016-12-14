<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DB;
use App\Carro;
use App\Mail\correos;
use App\Compra_Producto;
use App\Compra;
use App\Categoria;
use Illuminate\Support\Facades\Mail;

class cartController extends Controller
{

    //no implementado
    public function mArticulos(){
        
        $id_user = \Auth::user()->id;
      $carrito = DB::select('SELECT * FROM carrito WHERE id_user='. $id_user .';');
        $articulosCarrito=count($carrito);
    }

    public function carro(){

        $id_user = \Auth::user()->id;

        $existe = DB::select('SELECT * FROM carrito WHERE id_user='. $id_user .';');
        if(count($existe) <= 0){
            return view('carroVacio');
        }else{


        $productosCarrito = DB::select("select p.nombre, p.cantidad, p.precio, c.cantidadPedido,c.id_producto,(p.precio*c.cantidadPedido) as 'subtotal'
                        from carrito c
                        inner join users u on c.id_user = u.id
                        inner join productos p on c.id_producto = p.id
                        where c.id_user = " . $id_user);

    }
        return view('carro',compact('productosCarrito'));

    }

    public function addCar($id){

   
        $id_user = \Auth::user()->id;

        $existe = DB::select('SELECT * FROM carrito WHERE id_producto='. $id .' AND id_user=' .$id_user.';');
        if(count($existe) > 0)
        {
             flash()->overlay('Pelicula ya agregada a rentas', 'Atención');

        }else{

        $nuevoArticulo= new Carro();
        $nuevoArticulo->id_producto=$id;
        $nuevoArticulo->id_user=$id_user;
        $nuevoArticulo->save();

		flash()->overlay('Pelicula agregado a rentas', 'Atención');
        }

		return redirect()->back(); 	
    }
    public function eliminarCar($id){   

		DB::table('carrito')->where('id_producto', '=', $id)->delete();
 		flash()->overlay('Pelicula borrado de rentas', 'Atención');
		return redirect()->back(); 	
   		
    }

    public function caja(){

        $id_user = \Auth::user()->id;

        $existe = DB::select('SELECT * FROM carrito WHERE id_user='. $id_user .';');
        if(count($existe) <= 0)
        {
            return view('carroVacio');

        }else{

      $mostrarCaja = DB::select("select p.nombre, p.cantidad, p.precio, c.cantidadPedido,c.id_producto,(p.precio*c.cantidadPedido) as 'subtotal'
                        from carrito c
                        inner join users u on c.id_user = u.id
                        inner join productos p on c.id_producto = p.id
                        where c.id_user = " . $id_user);

    }
        return view('caja',compact('mostrarCaja'));

    }

    public function actualizarCarro(Request $datos){

      $id_p=$datos->input('id_producto');
      $cantidad=$datos->input('cantidad_articulos');

      $nuevaCantidad=DB::table('carrito')
            ->where('id_producto', $id_p)
            ->update(['cantidadPedido' => $cantidad]);

            return redirect()->back();
    }

    public function hacerPedido( Request $dato){

        $totalCompra=$dato->input('total');
        $id_user = \Auth::user()->id;

        //agregando la compra a la tabla compras
        $compra=new Compra();
        $compra->id_user=$id_user;
        $compra->totalCompra=$totalCompra;
        $compra->save();

        $mostrarCaja = DB::select("select p.nombre,p.precio,c.id_producto,cp.id,c.cantidadPedido,(p.precio*c.cantidadPedido) as 'subtotal'
                        from carrito c
                        inner join users u on c.id_user = u.id
                        inner join compras cp on c.id_user = cp.id_user
                        inner join productos p on c.id_producto = p.id
                        where c.id_user = " . $id_user." and cp.totalCompra =".$totalCompra);
               
            //agregar los productos a la tabla compras-productos
            foreach ($mostrarCaja as $m) {
                
                $nCompra_P = new Compra_Producto();
                $nCompra_P->id_producto=$m->id_producto;
                $nCompra_P->id_compra=$m->id;
                $nCompra_P->cantidad=$m->cantidadPedido;
                $nCompra_P->importe=$m->subtotal;
                $nCompra_P->save();
            }

            //borrar elementos del carrito
            Carro::where('id_user',$id_user)->delete();

        //pdf ticket
           $vista=view('ticket',compact('mostrarCaja'));
           $dompdf=\App::make('dompdf.wrapper');
           $dompdf->loadHTML($vista);
           return $dompdf->stream('ticket.pdf');

        //return redirect()->back();
       
    }

}
