<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoBodega extends Model
{
    protected $table = 'productobodegas';

    protected $fillable = [
        'producto_id', 'bodega_id','stock', 'estado'
    ];

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }

    public function bodega()
    {
        return $this->belongsTo('App\Models\Bodegam');
    }
    
}