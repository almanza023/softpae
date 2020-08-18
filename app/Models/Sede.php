<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes';

    protected $fillable = [
        'institucion_id', 'nombre', 'estado'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper ($value);
    }


    public function beneficiarios()
    {
        return $this->hasMany('App\Models\Beneficiarios');
    }

    public function institucion()
    {
        return $this->belongsTo('App\Models\Institucion');
    }





}
