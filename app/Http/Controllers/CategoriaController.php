<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    //

    
    public function show(Categoria $categoria){


        return view('productos.index',[

            'categoria'=>$categoria,

            'productos'=>$categoria->productos()->with('categoria')->latest()->paginate(5)

        ]);

    }
}
