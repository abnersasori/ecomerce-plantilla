<?php

namespace App\Http\Controllers;

use App\Models\Producto;

use Illuminate\Http\Request;

use App\Models\Categoria;

use App\Http\Requests\saveProductoRequest;

class ProductoController extends Controller
{
    //

    public function index(){


       $productos=Producto::with('categoria')->latest()->paginate();
        
        return view('productos.index',compact('productos'));

    }


    public function show(Producto $producto){

        //$escuela=Escuela::findOrFail($id);


        return view('productos.show', [

            'producto'=>$producto
        ]);
    }






    public function renderCreate(){


        return view('productos.renderCreate',[

            'categorias'=>Categoria::get()
        ]);

    }




    public function createRegistro(saveProductoRequest $request){


        $producto= new Producto($request->validated());

        $producto->image=$request->file('image')->store('images'); // este es el codigo para guardar imagenes

        $producto->save();

        return redirect()->route('productos.index')->with('status','el proyecto fue agregado con exito');
   }




   public function renderEditarRegistro(Producto $producto){

        
    return view('productos.renderEditarRegistro', [

        'producto'=>$producto,
        'categorias'=>Categoria::get()
    ]);

}


public function editarRegistro(Producto $producto,saveProductoRequest $request){

    
    if($request->hasFile('image')){

        $producto= $producto->fill($request->validated());

        $producto->image=$request->file('image')->store('images');

        $producto->save();

    }else{

        $producto->update(array_filter($request->validated()));
    }
     return redirect()->route('productos.index');
}


public function eliminarRegistro(Producto $producto){

    $producto->delete();


    return redirect()->route('productos.index');

}



}
