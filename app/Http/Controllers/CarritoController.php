<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;

use App\Models\User;


use App\Models\Pedido;



use App\Http\Requests\AgregarCarritoRequest;

class CarritoController extends Controller
{
    // metodos del carrito 


    // funcion para agregar un nuevo pedido al carrito
    public function agregarCarrito(Producto $producto, User $user, AgregarCarritoRequest $request){
     

        $pedido= new Pedido($request->validated());

        $pedido->codigo=$producto->codigo;

        $pedido->user_id=$user->id;
        
        $pedido->image=$producto->image;

        $pedido->precio=$producto->precio;

        $pedido->save();

        return redirect()->route('productos.index')->with('status','el proyecto fue agregado con exito');

    }



    // esta funcion sirve mostrar el carrito

    public function mostrarCarrito(){
  
        return view('carrito');

    }

// funcion para eliminar un elemento del carrito

    public function eliminarRegistro(Pedido $pedido){

        $pedido->delete();
        
        return redirect()->route('productos.index');
    }





}
