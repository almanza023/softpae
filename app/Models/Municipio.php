<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';

    protected $fillable = [
        'nombre', 'departamento_id'
    ];

    public function instituciones()
    {
        return $this->hasMany('App\Institucion');
    }
}
