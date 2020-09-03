<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    protected $table = 'preorders';

    protected $fillable = [
        'producto_id',
        'sede_id',
        'jornada_id',
        'cantidad1',
        'cantidad2',
        'cantidad3',
        'total',
        'estado'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function productos()
    {
        return $this->hasMany('App\Beneficiarios');
    }
}
