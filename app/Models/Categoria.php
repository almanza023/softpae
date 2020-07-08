<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre', 'descripcion', 'estado'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }
 
    

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
