<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoComplemento extends Model
{
    protected $table = 'tipo_complementos';

    protected $fillable = [
        'nombre', 'estado'
    ];

    public function beneficiarios()
    {
        return $this->hasMany('App\Models\Beneficiarios');
    }
}
