<?php

namespace App\Models;

use App\Models\Categoria;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=['nombre','descripcion','categoria_id','codigo','cantidad','precio'];
    use HasFactory;


    public function categoria($value=''){


       return  $this->belongsTo(Categoria::class);

    }
}
