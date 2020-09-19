<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    protected $table = 'orden_compras';

    protected $fillable = [
        'id_proveedor', 'id_usuario', 'fecha', 'total', 'estado'
    ];

    
}
