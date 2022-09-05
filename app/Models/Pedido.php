<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\User;

class Pedido extends Model
{
    use HasFactory;

    //asignacion masiva de datos

    protected $fillable=['codigo','user_id','cant','precio'];


    // con esto podemos definir que existe una relacion entre este modelo o tabla

    public function user($value=''){

        return  $this->belongsTo(User::class,'user_id');
    }
}
