<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoEtario extends Model
{
    protected $table = 'grupo_etarios';

    protected $fillable = [
        'rango', 'descripcion', 'estado'
    ];

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = ucwords($value);
    }

    public function beneficiarios()
    {
        return $this->hasMany('App\Beneficiarios');
    }

    
}
