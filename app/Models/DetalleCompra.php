<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalles_compras';

    protected $fillable = [
        'compra_id', 'producto_id', 'precio', 'cantidad'
    ];
}
