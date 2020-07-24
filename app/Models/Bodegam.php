<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodegam extends Model
{
    protected $table = 'bodegas';

    protected $fillable = [
        'nombre', 'descripcion','direccion','contacto', 'estado', 'municipio_id'
    ];

    public function municipio()
    {
        return $this->belongsTo('App\Models\Municipio');
    }
    
}