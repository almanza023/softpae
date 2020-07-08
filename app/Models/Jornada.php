<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table = 'jornadas';

    protected $fillable = [
        'nombre', 'descripcion', 'estado'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    public function beneficiarios()
    {
        return $this->hasMany('App\Beneficiarios');
    }
}
