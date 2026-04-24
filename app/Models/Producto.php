<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //Campos que Laravel permite guardar o actualizar desde los formularios
    protected $fillable = [
        //Codigo unico que usamos para identificar el producto al eliminarlo
        'codigo',
        'nombre',
        'categoria',
        'precio',
        'stock'
    ];
}
