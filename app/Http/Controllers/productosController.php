<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Comentario;
use App\Producto_Categoria;
use DB;
use Redirect;

class productosController extends Controller
{
    public function mCategorias(){
        //muestra todas las categorias registradas
      $cat=Categoria::all();

  
      return view('/principal',compact('cat'));

    }

     public function mProductosPorCategoria($id){

        //se consulta los productos por categoria por su id
    	$productos=DB::table('productos_categorias as pc')
	   ->join('productos as p','pc.id_producto','=','p.id')
	   ->join('categorias as c','pc.id_categoria','=','c.id')
       ->select('p.id','p.nombre','p.descripcion','p.precio','p.cantidad','p.imagen')
       ->where('c.id','=',$id)
       ->get();
  
       //muestra todas las categorias registradas
        $cat = Categoria::all();

        $catName=DB::table('categorias as c')
        ->select('c.nombre_categoria')
        ->where('c.id','=',$id)
        ->first();

    	return view('/categoria',compact('cat','productos','catName'));
    
    
    }

    public function mProductoIndividual($id){

        //informacion del producto por su id
    	$producto=DB::table('productos as p')
		->select('p.id','p.nombre','p.descripcion','p.precio','p.cantidad','p.imagen')
		->where('p.id','=',$id)
		->get();

  
       //muestra todas las categorias registradas
       $cat=Categoria::all();
      return view('/producto',compact('cat','producto'));

    }

}
