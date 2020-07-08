<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $fillable = [
        'prefijo', 'descripcion', 'estado'
    ];

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = ucwords($value);
    }

    public function setPrefijoAttribute($value)
    {
        $this->attributes['prefijo'] = ucwords($value);
    }


    public function productos()
    {
        return $this->hasMany('App\Models\Unidad');
    }
}
