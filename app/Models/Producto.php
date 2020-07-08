<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre', 'descripcion', 'estado', 'categoria_id', 'unidad_id'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad');
    }
    
}
