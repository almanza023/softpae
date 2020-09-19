<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';

    protected $fillable = [
        'pedido_id', 'producto_id', 'cantidad1', 'cantidad2', 'cantidad3', 'total', 'estado'

    ];


    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }













}
